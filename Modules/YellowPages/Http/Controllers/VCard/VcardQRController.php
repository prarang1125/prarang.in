<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use App\Models\UserPurchasePlan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VcardQRController extends Controller
{

    ##------------------------- QR Generate ---------------------##
    public function generateQrCode()
    {
        try {
            $userId = Auth::id();
            $vcard = Vcard::where('user_id', $userId)->latest()->first();

            if (!$vcard) {
                return redirect()->route('vCard.createCard')->with('message', 'No VCard found for this user. Please create a new one.');
            }

            $vcardId = $vcard->id;

            // Generate QR code
            $qrCode = QrCode::size(200)->generate(route('vCard.scanView', ['id'=>$vcard->id,'slug' => $vcard->slug]));
            return view('yellowpages::Vcard.QRvCard', compact('qrCode', 'vcardId'));
        } catch (\Exception $e) {
            Log::error('Error generating QR code: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Unable to generate QR code.']);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- QR Download ---------------------##
    public function downloadQrCode()
    {
        try {
            $userId = Auth::id();
            $vcard = Vcard::where('user_id', $userId)->latest()->firstOrFail();

            // Generate QR code
            $qrCode = QrCode::size(200)->generate(route('vCard.scanView', ['id'=>$vcard->id,'slug' => $vcard->slug]));

            // Create a temporary file to store the QR code image
            $tempFile = tempnam(sys_get_temp_dir(), 'qr_');
            file_put_contents($tempFile, $qrCode);

            return response()->download($tempFile, 'vcard_qr_code.png')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Error downloading QR code: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Unable to download QR code.']);
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- QR Scan ---------------------##
    public function scanAndView($id, $slug ,$count = 1)
    {
        try {
            $vcard = Vcard::where('slug', $slug)->orWhere('id', $id)->first();

            if ($vcard) {

                UserPurchasePlan::where('user_id', $vcard->user_id)
                ->increment('current_qr_scan' , 1);
            } else {
                Log::error("vCard not found for QR Code: {$slug}");
                abort(404, 'vCard not found');
            }

            return view('yellowpages::Vcard.CardView', compact('vcard'));

        } catch (\Exception $e) {
            Log::error('Error in scanAndView: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Unable to view the vCard.']);
        }
    }
    ##------------------------- END ---------------------##

}
