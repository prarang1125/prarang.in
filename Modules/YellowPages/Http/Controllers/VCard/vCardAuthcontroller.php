<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public function userEdit($id){
        $user = User::findOrFail($id);
        return view('yellowpages::Vcard.userUpdate', compact('user'));

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
    
            return redirect()->route('vCard.userEdit',$id)->with('success', 'User updated successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'User not found.']);
        }
    }    
    
}
