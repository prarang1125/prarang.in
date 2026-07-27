<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShortnerUrl extends Controller
{
    public function index(Request $request, $query)
    {
        $parts = explode('-', $query);
        $data = [];
        foreach ($parts as $part) {
            $key = substr($part, 0, 1);
            $value = substr($part, 1);
            $data[$key] = $value;
        }
        if (!isset($data['0'])) {
            abort(404);
        }
        $postId = $data['0'];
        $userId = $data['1'] ?? null;
        $platformId = $data['2'] ?? null;

        switch ($platformId) {
            case '1':
                $platform = 'prarang';
                break;
            case '2':
                $platform = 'facebook';
                break;
            case '3':
                $platform = 'whatsapp';
                break;
            default:
                $platform = '';
                break;
        }


        $post = DB::table('chitti as ch')
            ->select('ch.chittiId', 'ch.SubTitle', 'p.city_name')
            ->join('vChittiGeography as vCg', 'ch.chittiId', '=', 'vCg.chittiId')
            ->join('vGeography as vg', 'vg.geographycode', '=', 'vCg.Geography')
            ->join('portals as p', 'vg.geographycode', '=', 'p.city_code')
            ->where('ch.chittiId', $postId)
            ->first();

        if (!$post) {
            abort(404);
        }

        $city = strtolower($post->city_name);
        $slug = Str::slug($post->SubTitle) ?? $post->chittiId;
        $redirectUrl = url("post-summary/{$city}/{$post->chittiId}/{$slug}?source={$platform}");
        return redirect($redirectUrl);
    }



    public function qShort(Request $request, $query = null, $custom = null)
    {
        $qUrl = $request->query('q', null);
        // Create Short URL
        if ($qUrl) {

            // Validate URL
            if (!filter_var($qUrl, FILTER_VALIDATE_URL)) {
                return response()->json([
                    'error' => 'Invalid URL',
                ], 400);
            }

            // If URL already exists, return existing hash
            $record = DB::table('q_short')
                ->where('url', $qUrl)
                ->first();

            if ($record) {
                return response()->json([
                    'hash' => $record->hash,
                ]);
            }

            // Use custom hash if provided
            if (!empty($custom)) {

                // Check if custom hash already exists
                if (DB::table('q_short')->where('hash', $custom)->exists()) {
                    return response()->json([
                        'error' => 'Custom hash already exists.',
                    ], 409);
                }

                $hash = $custom;
            } else {

                // Generate unique random hash
                do {
                    $hash = Str::random(10);
                } while (
                    DB::table('q_short')->where('hash', $hash)->exists()
                );
            }

            // Save URL
            DB::table('q_short')->insert([
                'hash' => $hash,
                'url'  => $$qUrl,
            ]);

            return response()->json([
                'hash' => $hash,
            ]);
        }

        // Redirect using hash
        $url = DB::table('q_short')
            ->where('hash', $query)
            ->value('url');

        if (!$url) {
            abort(404);
        }

        return redirect()->away($url);
    }
}
