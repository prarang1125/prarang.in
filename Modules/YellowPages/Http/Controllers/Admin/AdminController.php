<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessListing;
use App\Models\User;
use App\Models\CompanyLegalType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totallisting  = BusinessListing::count();
        $totalCategory   = Category::count();
        $totalcitys    = City::count();
        $totalUser    = User::count();
        return view('yellowpages::Admin.dashboard', compact(
             'totallisting', 'totalCategory', 'totalcitys','totalUser' 
        ));
    }

    public function userListing(Request $request) {
            $users = User::all();
        return view('yellowpages::Admin.user-listing', compact('users'));
    }

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
