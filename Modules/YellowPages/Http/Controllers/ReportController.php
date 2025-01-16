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
use Exception;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    ##------------------------- Report Page ---------------------##
    public function index()
    {
        return view("yellowpages::Vcard.report");
    }
    ##------------------------- End ---------------------##

    ##------------------------- Report store ---------------------##

    public function store(Request $request)
    {
        try {
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
                $filePath = $request->file('file')->store('yellowpages/reports');
            }

            // Store the report in the database
            Report::create([
                'user_id'=>Auth::id(),
                'name' => $request->name,
                'business_email' => $request->business_email,
                'number' => $request->number,
                'message' => $request->message,
                'file' => $filePath,
            ]);

            return redirect()->back()->with('success', 'Report submitted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error submitting report: ' . $e->getMessage());
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Report list ---------------------##
    public function list(Request $request) {
        try {
            $report_list = Report::where('user_id', Auth::id())->get();
            return view('yellowpages::Vcard.report-list', compact('report_list'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching report listings: ' . $e->getMessage());
        }
    }
    ##------------------------- END ---------------------##

}
