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
            'phone' => 'required',
            'password' => 'required',
            'city_id' => 'required',
        ], [
            'phone.required' => __('yp.phone_required'),
            'password.required' => __('yp.password_required'),
            'city_id.required' => __('yp.city_required'),
        ]);

        $loginValue = $request->phone;
        $isEmail = filter_var($loginValue, FILTER_VALIDATE_EMAIL);

        // Remove '+91' from the beginning of the phone number if it exists (only if not email)
        if (!$isEmail && strpos($loginValue, '+91') === 0) {
            $loginValue = substr($loginValue, 3);
        }

        try {
            // Check if user exists with given city and phone/email
            $user = User::where('city_id', $request->city_id)
                ->where(function ($query) use ($loginValue, $isEmail) {
                    if ($isEmail) {
                        $query->where('email', $loginValue);
                    } else {
                        $query->where('phone', $loginValue);
                    }
                })
                ->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
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
