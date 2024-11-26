<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessListing;
use App\Models\BusinessHour;
use App\Models\CompanyLegalType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    public function index()
    {
        return view('yellowpages::admin.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->passes()){

            $credentials = [
                'email' => $request->email,
                'password' => $request->password, // Use 'password' key here
            ];
            if(Auth::guard('admin')->attempt($credentials)){
                $user = Auth::guard('admin')->user();
                if($user->id != 1){
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'You are not authorized to acces this message');
                }
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('admin.login')->with('error', 'Either mail or password is incorrect');
            }
        }else{
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('yellowpages::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('yellowpages::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('yellowpages::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
