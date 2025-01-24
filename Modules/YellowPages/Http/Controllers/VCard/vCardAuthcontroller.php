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

class vCardAuthcontroller extends Controller
{
    ##------------------------- userEdit ---------------------##
    public function userEdit($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('yellowpages::Vcard.userUpdate', compact('user'));
        } catch (ModelNotFoundException $e) {
            Log::error('User not found: ' );
            return redirect()->back()->withErrors(['error' => 'User not found.']);
        } catch (\Exception $e) {
            Log::error('Error editing user: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to fetch user details.']);
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
                'password' => empty($request->password) ? $request->password:Hash::make($validatedData['password']),
                'is_active' => $validatedData['is_active'],
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->route('vCard.userEdit', $id)->with('success', 'User updated successfully.');
        } catch (ModelNotFoundException $e) {
            Log::error('User not found: ' );
            return redirect()->back()->withErrors(['error' => 'User not found.']);
        } catch (\Exception $e) {
            Log::error('Error updating user: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to update user details.']);
        }
    }
    ##------------------------- END ---------------------##
}
