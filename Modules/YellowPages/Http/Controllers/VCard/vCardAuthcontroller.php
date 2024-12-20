<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class vCardAuthcontroller extends Controller
{
    public function index()
    {
        return view('yellowpages::Vcard.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('vCard.login')
                ->withInput()
                ->withErrors($validator);
        }
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('web')->attempt($credentials, $request->remember)) {
            return redirect()->route('vCard.dashboard'); // Redirect to the custom dashboard route
        } else {
            return redirect()->route('vCard.login')
                ->with('error', 'Invalid email or password.');
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
