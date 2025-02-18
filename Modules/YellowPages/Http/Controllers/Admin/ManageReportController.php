<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\ReportStatusMail;


class ManageReportController extends Controller
{
       ##------------------------------------------ Report -----------------------------------##
       public function Report()
       {
           try {
               $reports = Report::paginate(10); 
               return view('yellowpages::admin.report', compact('reports'));
           } catch (\Exception $e) {
               Log::error($e->getMessage());
               return redirect()->back()->with('error', 'Unable to fetch Report. Please try again later.');
           }
       }
       ##------------------------------------------ END -----------------------------------##
       ##------------------------------------------ Upddate Report Status-----------------------------------##
       public function updateStatus(Request $request, $id)
       {
           DB::beginTransaction();
       
           try {
               $report = Report::findOrFail($id);
       
               // Update the status
               $report->status = $request->status;
       
               // Send email notification
               Mail::to($report->business_email)->send(new ReportStatusMail($report));
       
               // If email is sent successfully, commit the transaction
               $report->save();
       
               DB::commit();
       
               return redirect()->back()->with('success', 'Status updated and email sent successfully.');
           } catch (\Exception $e) {
               DB::rollBack(); // Roll back the status update if sending the email fails
       
               Log::error($e->getMessage());
               return redirect()->back()->with('error', 'Failed to update status or send email.');
           }
       }
       ##------------------------------------------ END -----------------------------------##
}
