<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class vCardAuthcontroller extends Controller
{
    ##------------------------- userEdit ---------------------##
    public function userEdit($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('yellowpages::Vcard.userUpdate', compact('user'));
        } catch (ModelNotFoundException $e) {
            Log::error('User not found: ');
            return redirect()->back()->withErrors(['error' => __('yp.user_not_found')]);
        } catch (\Exception $e) {
            Log::error('Error editing user: ');
            return redirect()->back()->withErrors(['error' => __('yp.user_fetch_error')]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- userUpdate ---------------------##
    public function userUpdate(Request $request, $id)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'sometimes|string|min:8|confirmed',
                'is_active' => 'required|boolean',
            ]);

            // Find user or handle if not found
            $user = User::findOrFail($id);

            // Update user details
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => empty($request->password) ? $request->password : Hash::make($validatedData['password']),
                'is_active' => $validatedData['is_active'],
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->route('vCard.userEdit', $id)->with('success', __('yp.user_updated_success'));
        } catch (ModelNotFoundException $e) {
            Log::error('User not found: ');
            return redirect()->back()->withErrors(['error' => __('yp.user_not_found')]);
        } catch (\Exception $e) {
            Log::error('Error updating user: ');
            return redirect()->back()->withErrors(['error' => __('yp.user_update_error')]);
        }
    }
    ##------------------------- END ---------------------##
    public function passwordReset()
    {
        try {
            $user = Auth::user();
            return view('yellowpages::Vcard.userPasswordReset', compact('user'));
        } catch (ModelNotFoundException $e) {
            Log::error('User not found: ');
            return redirect()->back()->withErrors(['error' => __('yp.user_not_found')]);
        } catch (\Exception $e) {
            Log::error('Error editing user: ');
            return redirect()->back()->withErrors(['error' => __('yp.user_fetch_error')]);
        }
    }

    public function passwordUpdate(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'password' => 'required|confirmed',
        ], [
            'password.required' => __('yp.password_required'),
            'password.confirmed' => __('yp.password_confirmed_error'),
        ]);

        try {
            // Find the user by ID
            $user = User::findOrFail($id);

            // Update password if provided (no need to check if it's empty since it's required now)
            $user->update([
                'password' => Hash::make($validatedData['password']),
                'updated_at' => Carbon::now(),
            ]);

            // Redirect with success message
            return redirect()->back()->with('success', __('yp.password_updated_success'));
        } catch (\Exception $e) {
            // Log the error if something goes wrong
            Log::error('Error updating user password: ');
            return redirect()->back()->withErrors(['error' => __('yp.password_update_error')]);
        }
    }
}
