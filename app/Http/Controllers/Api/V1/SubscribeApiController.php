<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SubscribeApiController extends Controller
{
    public function subscribe(Request $request)
    {
        try {
            // ✅ Validate request inputs
            $validated = $request->validate([
                'mobile' => ['required', 'regex:/^[0-9]{10}$/'],
                'name'   => ['required', 'string', 'max:255'],
                'city'   => ['required', 'string', 'max:255'],
                'email'  => ['nullable', 'email', 'max:255'],
            ]);

            $mobile = $validated['mobile'];
            $name   = $validated['name'];
            $cityName = $validated['city'];
            $email  = $validated['email'] ?? null;

            // ✅ Find city (case-insensitive search)
            $city = City::where('name', 'like', "%{$cityName}%")->first();

            if (!$city) {
                return response()->json([
                    'status'  => false,
                    'message' => 'City not found.',
                    'data'    => [],
                ], 404);
            }

            // ✅ Check if same user already exists for that city
            $existingUser = User::where('phone', $mobile)
                ->where('city_id', $city->id)
                ->first();

            if ($existingUser) {
                return response()->json([
                    'status'  => false,
                    'message' => 'This phone number is already subscribed for this city.',
                    'data'    => [],
                ], 409);
            }

            // ✅ Generate unique user_code
            do {
                $userCode = Str::slug($name) . '-' . Str::random(4);
            } while (User::where('user_code', $userCode)->exists());

            // ✅ Create new user
            $user = User::create([
                'name'      => $name,
                'phone'     => $mobile,
                'city_id'   => $city->id,
                'email'     => $email,
                'password'  => Hash::make(Str::random(8)), // temporary random password
                'role'      => 4,
                'user_code' => $userCode,
            ]);


            return response()->json([
                'status'  => true,
                'message' => 'Subscription successful.',
                'data'    => [
                    'user_id'   => $user->id,
                    'user_code' => $user->user_code,
                ],
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation error.',
                'errors'  => $e->errors(),
                'data'    => [],
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Something went wrong.',
                'error'   => $e->getMessage(),
                'data'    => [],
            ], 500);
        }
    }
}
