<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visits;
use App\Models\Report;
use App\Models\Savelisting;
use App\Models\CompanyLegalType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('yellowpages::report.create');
    }
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'business_email' => 'required|email',
            'number' => 'required|string|max:15',
            'message' => 'required|string',
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', // Max file size: 2MB
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('reports', 'public');
        }

        // Store the report in the database
        Report::create([
            'name' => $request->name,
            'business_email' => $request->business_email,
            'number' => $request->number,
            'message' => $request->message,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Report submitted successfully.');
    }
}
