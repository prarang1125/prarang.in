<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessListing;
use Illuminate\Support\Facades\Storage;
use App\Models\BusinessHour;
use App\Models\CompanyLegalType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    ##------------------------- Admin Authenticate page ---------------------##
    public function index()
    {
        return view('yellowpages::admin.login');
    }
    ##------------------------------- End ------------------------------------##

    ##------------------------- Admin Authenticate function ---------------------##

    public function authenticate(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }
    
        try {
            $credentials = $request->only('email', 'password');
    
            if (Auth::guard('admin')->attempt($credentials)) {
                $user = Auth::guard('admin')->user();
    
                // Redirect based on role
                if ($user->role == 1) {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->role == 3) {
                    return redirect()->route('manager.dashboard'); // Change this route if needed
                }
    
                // Logout if the user doesn't have a valid role
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'आपके पास व्यवस्थापक अधिकार नहीं हैं');
            }
    
            return redirect()->route('admin.login')->with('error', 'ईमेल या पासवर्ड गलत है');
    
        } catch (Exception $e) {
            return redirect()->route('admin.login')->with('error', 'प्रमाणीकरण के दौरान त्रुटि: ' );
        }
    }
    

    ##------------------------- END ---------------------##
}
