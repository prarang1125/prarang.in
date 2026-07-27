<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SubscribeApiController extends Controller
{
    public function subscribe(Request $request)
    {
        try {
            // Validate request inputs
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


            // Generate a unique user code for the subscriber
            $userCode = Str::slug($name) . '-' . Str::random(4);



            // Create new subscriber using Query Builder
            $subscriberId = DB::connection('main')->table('subscriber')->insertGetId([
                'user_code'  => $userCode,
                'name'       => $name,
                'email'      => $email,
                'mobile'     => $mobile,
                'city'       => $cityName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            return response()->json([
                'status'  => true,
                'message' => 'Subscription successful.',
                'data'    => [
                    'id'        => $subscriberId,
                    'user_code' => $userCode,
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
