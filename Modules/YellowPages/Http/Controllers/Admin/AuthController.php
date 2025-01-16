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
        return view('yellowpages::Admin.login');
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
            try {

            if ($validator->passes()) {

                // Credentials to attempt login
                $credentials = [
                    'email' => $request->email,
                    'password' => $request->password,
                ];

                // Attempt to authenticate with the provided credentials
                if (Auth::guard('admin')->attempt($credentials)) {
                    $user = Auth::guard('admin')->user();

                    // Check if the user's role is '1' (Admin)
                    if ($user && $user->role == 1) {
                        return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
                    } else {
                        // If user is not admin (role != 1), log out and show error
                        Auth::guard('admin')->logout();
                        return redirect()->route('admin.login')->with('error', 'आपके पास व्यवस्थापक अधिकार नहीं हैं');
                    }
                } else {
                    return redirect()->route('admin.login')->with('error', 'ईमेल या पासवर्ड गलत है');
                }

            } else {
                return redirect()->route('admin.login')
                    ->withInput()
                    ->withErrors($validator);
            }

        } catch (Exception $e) {
            return redirect()->route('admin.login')->with('error', 'Error during authentication: ' . $e->getMessage());
        }
    }

    ##------------------------- END ---------------------##
}
