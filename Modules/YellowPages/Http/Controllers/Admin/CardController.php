<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use Exception;
use Illuminate\Support\Facades\Auth;


class CardController extends Controller
{
    public function VcardList(Request $request) {
         try {
            $query = Vcard::where('is_active', 1);
            
            // Check if there's a search query
            if ($request->has('search') && $request->search != '') {
                $searchTerm = $request->search;
                
                // Join with the users table to search by user's name
                $Vcard_list = $query->whereHas('user', function($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%');
                })->get();
            } else {
                $Vcard_list = $query->get();
            }
            
            return view('yellowpages::admin.vcard_list', compact('Vcard_list'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching Vcard listings: ' );
        }
    }
}
