<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VCard;
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
            $vcard = VCard::where('user_id', $userId)->latest()->first();

            if (!$vcard) {
                return redirect()->route('vCard.createCard')->with('message', __('yp.no_vcard_found'));
            }

            $vcardId = $vcard->id;

            // Generate QR code
            $qrCode = QrCode::size(200)->generate(route('vCard.scanView', ['id' => $vcard->id, 'slug' => $vcard->slug]));
            return view('yellowpages::Vcard.QRvCard', compact('qrCode', 'vcardId'));
        } catch (\Exception $e) {
            Log::error('Error generating QR code: ');
            return redirect()->back()->withErrors(['error' => __('yp.qr_generation_error')]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- QR Download ---------------------##
    public function downloadQrCode()
    {
        try {
            $userId = Auth::id();
            $vcard = VCard::where('user_id', $userId)->latest()->firstOrFail();

            // Generate QR code
            $qrCode = QrCode::size(200)->generate(route('vCard.scanView', ['id' => $vcard->id, 'slug' => $vcard->slug]));

            // Create a temporary file to store the QR code image
            $tempFile = tempnam(sys_get_temp_dir(), 'qr_');
            file_put_contents($tempFile, $qrCode);

            return response()->download($tempFile, 'vcard_qr_code.png')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Error downloading QR code: ');
            return redirect()->back()->withErrors(['error' => __('yp.qr_download_error')]);
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- QR Scan ---------------------##
    public function scanAndView($id, $slug, $count = 1)
    {
        try {
            $vcard = VCard::where('slug', $slug)->orWhere('id', $id)->first();

            if ($vcard) {

                UserPurchasePlan::where('user_id', $vcard->user_id)
                    ->increment('current_qr_scan', 1);
            } else {
                Log::error("vCard not found for QR Code: {$slug}");
                abort(404, __('yp.vcard_not_found_abort'));
            }

            return view('yellowpages::Vcard.CardView', compact('vcard'));
        } catch (\Exception $e) {
            Log::error('Error in scanAndView: ');
            return redirect()->back()->withErrors(['error' => __('yp.unable_to_view_vcard')]);
        }
    }
    ##------------------------- END ---------------------##

}
