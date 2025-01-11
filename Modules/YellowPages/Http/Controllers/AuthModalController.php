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
            'email' => ['required', 'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/u'],
            'password' => 'required',
        ]);

        try {
        // Attempt login with credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if the user's role is '2' (Customer)
            if ($user->role == 2) {
                return redirect()->route('vCard.dashboard'); // Redirect if role is '2'
            } else {
                // Log out if the role is not '2'
                Auth::logout();
                return redirect()->back()->withErrors(['loginError' => 'Access restricted. You do not have customer rights.'])->withInput();
            }
        }

        // Return with error if login fails
        return redirect()->back()->withErrors(['loginError' => 'Invalid credentials'])->withInput();
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'An error occurred during login: ' . $e->getMessage()])->withInput();
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
                    'required',
                    'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/u',
                    Rule::unique('users', 'email'),
                ],
                'password' => 'required|confirmed', // password confirmation should be part of the form
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

            // Redirect after registration
            return redirect()->route('vCard.dashboard'); // Replace with your desired redirect route
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails, return errors and old input
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle general errors and provide feedback
            return redirect()->back()->withErrors(['error' => 'An error occurred during registration: ' . $e->getMessage()])->withInput();
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
            return redirect()->back()->withErrors(['error' => 'An error occurred during logout: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END ---------------------##
}
