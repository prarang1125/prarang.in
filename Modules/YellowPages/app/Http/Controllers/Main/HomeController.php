<?php
namespace Modules\YellowPages\app\Http\Controllers\Main;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all categories and cities from the database
        $categories = Category::all();
        $cities = City::all(); // Fetch all cities

        return view('yellowpages::Home.home', compact('categories', 'cities'));

        // Pass categories and cities to the view
        // return view('Home.home', compact('categories', var_names: 'cities'));
    }
    public function signIn(){
        return view("Auth.auth");
    }
    public function category(){
        return view('yellowpages::Home.categories');
    }

    public function showSearchcategory()
    {
        $categories = Category::all();  // Fetch all categories
        return view('Home.homapage', compact('categories'));
    }
}
