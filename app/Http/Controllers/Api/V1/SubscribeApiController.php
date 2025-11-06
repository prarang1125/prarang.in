<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubscribeApiController extends Controller
{
    public function subscribe(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'nullable|email',
                'phone' => 'required|string',
                'name' => 'required|string',
                'city_id' => 'required',
                'password' => 'required_if:is_vcard,true|string|min:6',
                'is_vcard' => 'nullable|boolean',
                'language' => 'nullable|string|in:en,es,fr,de,it,pt,ru,zh,hi,mr',
            ]);

            $phone = $validated['phone'];
            $city_id = $validated['city_id'];
            $name = $validated['name'];
            $is_vcard = $validated['is_vcard'] ?? false;
            $password = $validated['password'] ?? null;

            // Check if user with same phone & city already exists
            if (User::where('phone', $phone)->where('city_id', $city_id)->exists()) {
                return response()->json([
                    'status' => false,
                    'message' => 'This phone number and city combination already exists.',
                    'data' => [],
                ], 409);
            }

            // Generate unique user code
            $userCode = Str::slug($name) . '-' . Str::random(4);
            while (User::where('user_code', $userCode)->exists()) {
                $userCode = Str::slug($name) . '-' . Str::random(4);
            }

            // Create user
            $user = User::create([
                'name' => $name,
                'phone' => $phone,
                'city_id' => $city_id,
                'email' => $validated['email'],
                'password' => $is_vcard ? Hash::make($password) : Str::random(8),
                'role' => $is_vcard ? 2 : 4,
                'user_code' => $userCode,
            ]);

            $city = City::find($city_id);

            return response()->json([
                'status' => true,
                'message' => 'Subscription successful',
                'data' => [
                    'user_id' => $user->id,
                    'user_code' => $user->user_code,
                    'share_url' => $is_vcard ? route('vCard.view', [
                        'city_arr' => Str::slug($city->city_arr ?? $city->name),
                        'slug' => $user->user_code
                    ]) : null,
                ],
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
                'data' => [],
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => 'Subscription failed',
                'data' => [],
            ], 500);
        }
    }
}
