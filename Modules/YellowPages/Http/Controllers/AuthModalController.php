<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Modules\YellowPages\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\City;
use Illuminate\Support\Facades\Hash;


class AuthModalController extends Controller
{
    public function index()
    {
        try {
            $cities = City::where('is_active', 1)->get();
            return view('yellowpages::Vcard.login', compact('cities'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('yp.login_page_error')]);
        }
    }

    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'phone' => 'required|regex:/^(\+91)?\d{10}$/',
            'password' => 'required',
            'city_id' => 'required',
        ], [
            'phone.required' => __('yp.phone_required'),
            'phone.regex' => __('yp.phone_regex'),
            'password.required' => __('yp.password_required'),
            'city_id.required' => __('yp.city_required'),
        ]);
        // Remove '+91' from the beginning of the phone number if it exists
        if (strpos($request->phone, '+91') === 0) {
            $request->merge(['phone' => substr($request->phone, 3)]);
        }

        try {
            // Validate request input
            $credentials = $request->only('city_id', 'phone', 'password');

            // Check if user exists with given city and phone
            $user = User::where('city_id', $credentials['city_id'])
                ->where('phone', $credentials['phone'])
                ->first();

            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                return redirect()->back()
                    ->withErrors(['error' => __('yp.invalid_credentials')])
                    ->withInput();
            }

            // Check if the user has the required role
            if ($user->role != 2) {
                return redirect()->back()
                    ->withErrors(['error' => __('yp.access_restricted')])
                    ->withInput();
            }

            // Authenticate and redirect the user
            Auth::login($user);
            return redirect()->route('vCard.createCard');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => __('yp.login_error') . $e->getMessage()])
                ->withInput();
        }
    }

    public function newAccount($city = null)
    {
        $slug = $city ?? request()->query('s');

        try {
            return view('yellowpages::Vcard.register', compact('slug'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('yp.register_page_error')]);
        }
    }




    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('yp.home')->with('success', __('yp.logout_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => __('yp.logout_error')]);
        }
    }
}
