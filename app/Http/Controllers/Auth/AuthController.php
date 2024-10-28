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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check if it's an AJAX request
            if ($request->ajax()) {
                return response()->json(['success' => true]);
            }
            return redirect()->intended('/dashboard');
        } else {
            if ($request->ajax()) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
            return redirect()->back()->withErrors(['loginError' => 'Invalid credentials']);
        }
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>1
        ]);
    
        Auth::login($user);
    
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
    
        return redirect('/dashboard')->with('success', 'Registration successful, you are now logged in.');
    }
}
