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
            return back()->withErrors(['error' => 'An error occurred while loading the login page.']);
        }
    }

    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'phone' => 'required|regex:/^(\+91)?\d{10}$/',
            'password' => 'required',
            'city_id'=>'required',
        ], [
            'phone.required' => 'फोन नंबर आवश्यक है।',
            'phone.regex' => 'कृपया एक वैध फोन नंबर दर्ज करें।',
            'password.required' => 'पासवर्ड आवश्यक है।',
            'city_id.required' => 'शहर आवश्यक है।',
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
                    ->withErrors(['error' => 'आपके द्वारा दिए गए विवरण सही नहीं हैं। कृपया फिर से प्रयास करें।'])
                    ->withInput();
            }

            // Check if the user has the required role
            if ($user->role != 2) {
                return redirect()->back()
                    ->withErrors(['error' => 'पहुँच प्रतिबंधित है। आपके पास ग्राहक अधिकार नहीं हैं।'])
                    ->withInput();
            }

            // Authenticate and redirect the user
            Auth::login($user);
            return redirect()->route('vCard.createCard');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'लॉगिन के दौरान एक त्रुटि हुई: ' . $e->getMessage()])
                ->withInput();
        }

    }

    public function newAccount()
    {

        $slug = request()->query('s');
        try {
            return view('yellowpages::Vcard.register', compact('slug'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the login page.']);
        }
    }



    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('yp.home')->with('success', 'लॉगआउट (logout) सफलतापूर्वक हो गया।');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'लॉगआउट (logout) के दौरान एक त्रुटि हुई। कृपया फिर से प्रयास करें।']);
        }
    }

}
