<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
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
            $qrCode = QrCode::size(200)->generate(route('vCard.scanView', ['qrCode' => $vcard->slug]));
            return view('yellowpages::VCard.QRvCard', compact('qrCode', 'vcardId'));
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
            $qrCode = QrCode::size(200)->generate(route('vCard.scanView', ['qrCode' => $vcard->slug]));

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
    public function scanAndView($qrCode, $count = 1)
    {
        try {
            $vcard = Vcard::where('slug', $qrCode)->orWhere('id', $qrCode)->first();

            if ($vcard) {
                // Update scan_count for the found vCard using its ID
                Vcard::where('id', $vcard->id)->increment('scan_count', $count);

                // Refresh the vCard instance to reflect the updated count
                $vcard->refresh();

                Log::info("Scan count updated for vCard ID: {$vcard->id}, New Scan Count: {$vcard->scan_count}");
            } else {
                Log::error("vCard not found for QR Code: {$qrCode}");
                abort(404, 'vCard not found');
            }

            // Return the view with the updated vCard details
            return view('yellowpages::VCard.CardView', compact('vcard'));
        } catch (\Exception $e) {
            Log::error('Error in scanAndView: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Unable to view the vCard.']);
        }
    }
    ##------------------------- END ---------------------##

}
