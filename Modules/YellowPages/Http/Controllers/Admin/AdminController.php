<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessListing;
use App\Models\User;
use App\Models\CompanyLegalType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{
    public function index()
    {
        $totallisting  = BusinessListing::count();
        $totalCategory   = Category::count();
        $totalcitys    = City::count();
        $totalUser    = User::count();
        return view('yellowpages::Admin.dashboard', compact(
             'totallisting', 'totalCategory', 'totalcitys','totalUser' 
        ));
    }

    public function userListing(Request $request) {
            $users = User::all();
        return view('yellowpages::Admin.user-listing', compact('users'));
    }

    public function userEdit($id){
        $user = User::findOrFail($id);

        return view('yellowpages::Admin.user-edit', compact('user'));
    }

    
    public function userUpdate(Request $request, $id)
    {
        try {

            // Find user or handle if not found
            $user = User::findOrFail($id);
    
            // Update user details
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_active' => $request->is_active,
                'updated_at' => Carbon::now(),
            ]);
    
            return redirect()->route('admin.user-listing')->with('success', 'User updated successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'User not found.']);
        }
    }    


public function userDelete($id)
{
    try {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user-listing')->with('success', 'User deleted successfully.');
    } catch (ModelNotFoundException $e) {
        return redirect()->route('admin.user-listing')->withErrors(['error' => 'User not found.']);
    } catch (\Exception $e) {
        return redirect()->route('admin.user-listing')->withErrors(['error' => 'An error occurred while trying to delete the user.']);
    }
}


public function userRegister()
{
    return view('yellowpages::Admin.user-register');
}

public function userStore(Request $request)
{
    // Validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|string|min:5',
        'role' => 'required',
    ]);

    // Proceed if validation passes
    if ($validator->passes()) {
        $currentDateTime = carbon::now();  // You can use Laravel's now() helper to get current time
        try {
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),  // Encrypt password
                'role' => $request->role,
                'created_at' => $currentDateTime,
                'isActive' => 1
            ]);
            $user->save();
            return redirect()->route('admin.user-listing')->with('success', 'User registered successfully.');

        } catch (\Exception $e) {
            // Handle errors in user creation
            return back()->with('error', 'There was an issue with user registration: ' . $e->getMessage());
        }
    } else {
        // Validation failed, return back with errors
        return redirect()->route('admin.user-register')
            ->withInput()
            ->withErrors($validator);
    }
}

public function logout() {
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
}
  
}
