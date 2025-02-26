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
            return view('yellowpages::Vcard.login');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the login page.']);
        }
    }

    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'phone' => ['required', 'regex:/^\+?[0-9]{10,15}$/'], 
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
                    return redirect()->route('vCard.createCard'); // Redirect if role is '2'
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

    public function newAccount($slug)
    {
        try {
            return view('yellowpages::Vcard.register');
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
