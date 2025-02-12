<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use App\Models\City;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;


class CardController extends Controller
{
    public function VcardList(Request $request)
    {
        try {
            $query = Vcard::query();
    
            // Check if there's a search query
            if ($request->filled('search')) {
                $searchTerm = $request->search;
                
                // Join with the users table to search by user's name
                $query->whereHas('user', function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%');
                });
            }
    
            $vcardList = $query->get(); // Correct variable name
    
            // Fetch cities and categories if there are VCards
            $cities = $vcardList->isNotEmpty() 
                ? City::whereIn('id', $vcardList->pluck('city_id'))->get()->keyBy('id') 
                : collect();
    
            $categories = $vcardList->isNotEmpty() 
                ? Category::whereIn('id', $vcardList->pluck('category_id'))->get()->keyBy('id') 
                : collect();
    
            return view('yellowpages::admin.vcard_list', compact('vcardList', 'cities', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching Vcard listings: ' . $e->getMessage());
        }
    }
    
}
