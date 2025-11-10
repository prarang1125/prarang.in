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
                'mobile' => 'required|string|regex:/^[0-9]{10}$/',
                'name' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
            ]);

            $mobile = $validated['mobile'];
            $city_name = $validated['city'];
            $name = $validated['name'];
            $email = $validated['email'] ?? null;

            // Find city by name (use 'yp' connection same as City model)
            $city = City::where('name', 'like', "%{$city_name}%")->first();

            if (!$city) {
                return response()->json([
                    'status' => false,
                    'message' => 'City not found',
                    'data' => [],
                ], 404);
            }

            $city_id = $city->id;

            // Check if user with same phone & city already exists
            if (User::where('phone', $mobile)->where('city_id', $city_id)->exists()) {
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
                'phone' => $mobile,
                'city_id' => $city_id,
                'email' => $email,
                'password' => Hash::make(Str::random(8)),
                'role' => 4,
                'user_code' => $userCode,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Subscription successful',
                'data' => [
                    'user_id' => $user->id,
                    'user_code' => $user->user_code,
                ],
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => 'Validation Error',
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
