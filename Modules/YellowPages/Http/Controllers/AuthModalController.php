<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AuthModalController extends Controller
{
    ##------------------------- Login View ---------------------##
    public function index()
    {
        try {
            return view('yellowpages::Vcard.login');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the login page.']);
        }
    }

    ##------------------------- END ---------------------##


    ##------------------------- Login Logic ---------------------##
    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'phone' => ['required', 'regex:/^\+?[0-9]{10,15}$/'], // Validate phone number
            'password' => 'required',
        ], [
            'phone.required' => 'फोन नंबर आवश्यक है।',
            'phone.regex' => 'कृपया एक वैध फोन नंबर दर्ज करें।',
            'password.required' => 'पासवर्ड आवश्यक है।',
        ]);

        try {
            // Attempt login with credentials
            $credentials = $request->only('phone', 'password');

            // Check if the user exists by phone number
            $user = User::where('phone', $credentials['phone'])->first();

            if ($user && Hash::check($credentials['password'], $user->password)) {
                // Check if the user's role is '2' (Customer)
                if ($user->role == 2) {
                    Auth::login($user); // Log the user in
                    return redirect()->route('vCard.dashboard'); // Redirect if role is '2'
                } else {
                    // Log out if the role is not '2'
                    Auth::logout();
                    return redirect()->back()->withErrors(['loginError' => 'पहुँच प्रतिबंधित है। आपके पास ग्राहक अधिकार नहीं हैं।'])->withInput();
                }
            }

            // Return with error if login fails
            return redirect()->back()->withErrors(['loginError' => 'आपके द्वारा दिए गए विवरण सही नहीं हैं। कृपया फिर से प्रयास करें।'])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'लॉगिन के दौरान एक त्रुटि हुई:'])->withInput();
        }
    }

    ##------------------------- END ---------------------##
    ##------------------------- Register View ---------------------##
    public function newAccount()
    {
        try {
            return view('yellowpages::Vcard.register');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the login page.']);
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Register Logic ---------------------##
    public function register(Request $request)
    {
        try {
            // Validate the input fields
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'regex:/^[^@]+$/'],
                'email' => [
                    'nullable',
                    'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/u',
                ],
                'phone' => [
                    'required',
                    'regex:/^\+?[0-9]{10,15}$/',
                ],
                'password' => 'required',
            ], [
                'name.required' => 'नाम आवश्यक है।',
                'name.regex' => 'कृपया एक वैध नाम दर्ज करें।',
                'email.regex' => 'कृपया एक वैध ईमेल पता दर्ज करें।',
                'email.unique' => 'यह ईमेल पहले से पंजीकृत है।',
                'phone.required' => 'फोन नंबर आवश्यक है।',
                'phone.regex' => 'कृपया एक वैध फोन नंबर दर्ज करें।',
                'phone.unique' => 'आपका फोन नंबर पहले से पंजीकृत है।',
                'password.required' => 'पासवर्ड आवश्यक है।',
                'password.confirmed' => 'पासवर्ड और पुष्टि मेल नहीं खाते।',
            ]);

            // Create a new user
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
                'role' => 2,
            ]);

            Auth::login($user);

            return redirect()->route('vCard.dashboard');
        } catch (\Exception $e) {
            return $e->getMessage();
            return redirect()->back()->withErrors(['error' => 'पंजीकरण के दौरान एक त्रुटि हुई। कृपया फिर से प्रयास करें।'])->withInput();
        }
    }


    ##------------------------- END ---------------------##

    ##------------------------- Logout ---------------------##
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            // Invalidate the session and regenerate the token
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('yp.home'); // Redirect to home page after logout
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'लॉगआउट (logout) के दौरान एक त्रुटि हुई। कृपया फिर से प्रयास करें।']);
        }
    }

    ##------------------------- END ---------------------##

}
