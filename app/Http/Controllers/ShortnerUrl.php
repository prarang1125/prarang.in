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
}
