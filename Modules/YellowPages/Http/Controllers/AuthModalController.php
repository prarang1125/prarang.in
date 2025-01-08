<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AuthModalController extends Controller
{
    public function index()
    {
        return view('yellowpages::Vcard.login');
    }
    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'email' => ['required', 'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/u'],
            'password' => 'required',
        ]);

        // Attempt login with credentials
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials + ['role' => 2])) {
            return redirect()->route('yp.home'); // Redirect if authenticated
        }
        // Return with error if login fails
        return redirect()->back()->withErrors(['loginError' => 'Invalid credentials'])->withInput();
    }

    // Registration method
    public function register(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/u',
                Rule::unique('users', 'email'),
            ],
            'password' => 'required',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 2, // Assign default role
        ]);

        // Log in the new user
        Auth::login($user);

        return redirect()->route('yp.home'); // Redirect after registration
    }

    // Logout method
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('yp.home'); // Redirect to home page after logout
    }
}
