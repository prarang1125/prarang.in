<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    
        // Validate the input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check if it's an AJAX request
            if ($request->ajax()) {
                return response()->json(['success' => true]);
            }
            return redirect()->intended('/dashboard');  // Redirect to the dashboard
        } else {
            if ($request->ajax()) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
            return redirect()->back()->withErrors(['loginError' => 'Invalid credentials']);  // Show error on failed login
        }
    }
    
    // Register Function
    public function register(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',  // Ensure passwords match
        ]);
    
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hash the password
            'role' => 2  // Assuming '1' is the default role
        ]);
    
        // Log the user in after successful registration
        Auth::login($user);
    
        // Handle the response
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
    
        // Redirect the user to the dashboard on successful registration
        return redirect('/home')->with('success', 'Registration successful, you are now logged in.');
    }

}
