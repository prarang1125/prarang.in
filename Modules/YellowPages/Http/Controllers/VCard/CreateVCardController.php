<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use App\Models\Plan;
use App\Models\User;
use Stripe\Stripe;
use Stripe\StripeClient;
use App\Models\PaymentHistory;
use App\Models\DynamicVcard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class CreateVCardController extends Controller
{
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'color_code' => 'nullable|string',
            'slug' => 'required|string',
            'banner_img' => 'nullable|image|max:2048',
            'logo' => 'nullable|image|max:2048',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'name' => 'nullable|array',
            'data' => 'nullable|array',
        ]);
    
        // Handle file uploads
        if ($request->hasFile('banner_img')) {
            $validatedData['banner_img'] = $request->file('banner_img')->store('banners', 'public');
        }
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $userId = Auth::id();
    
        // Ensure user ID is included
        $validatedData['user_id'] = $userId;

        // Save card
        $card = Vcard::create($validatedData);
    
        if (!$card) {
            return redirect()->back()->withErrors(['error' => 'Failed to create listing']);
        }
    
        // Save dynamic fields
        if (!empty($validatedData['name'])) {
            foreach ($validatedData['name'] as $index => $name) {
                if (!empty($name) && !empty($validatedData['data'][$index])) {
                    DynamicVcard::create([
                        'vcard_id' => $card->id,
                        'title' => $name,
                        'data' => $validatedData['data'][$index],
                    ]);
                }
            }
        }
    
        return redirect()->route('vCard.createCard')->with('success', 'Card saved successfully.');
    }

    public function vCardEdit($id) {
        $vcard = Vcard::findOrFail($id);
        $vcardInfo = DynamicVcard::where('vcard_id', $vcard->id)->get(); // Corrected the query for related information
        return view('yellowpages::VCard.vcardEdit', compact('vcard', 'vcardInfo'));
    }
    public function vCardUpdate(Request $request, $id) {
        $validatedData = $request->validate([
            'color_code' => 'nullable|string',
            'slug' => 'required|string',
            'banner_img' => 'nullable|image|max:2048',
            'logo' => 'nullable|image|max:2048',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'name' => 'nullable|array',
            'data' => 'nullable|array',
        ]);
    
        // Handle file uploads
        if ($request->hasFile('banner_img')) {
            $validatedData['banner_img'] = $request->file('banner_img')->store('banners', 'public');
        }
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }
    
        $userId = Auth::id();
    
        // Ensure user ID is included
        $validatedData['user_id'] = $userId;
    
        // Update card
        $card = Vcard::find($id)->update($validatedData);
    
        if (!$card) {
            return redirect()->back()->withErrors(['error' => 'Failed to update listing']);
        }
    
        // Save dynamic fields
        if (!empty($validatedData['name'])) {
            foreach ($validatedData['name'] as $index => $name) {
                if (!empty($name) && !empty($validatedData['data'][$index])) {
                    DynamicVcard::updateOrCreate(
                        ['vcard_id' => $id, 'title' => $name],
                        ['data' => $validatedData['data'][$index]]
                    );
                }
            }
        }
    
        return redirect()->route('vCard.view', $id)->with('success', 'Card updated successfully.');
    }
    


    public function view()
    {
        $userId = Auth::id();
        $vcard = Vcard::where('user_id', $userId)->with('dynamicFields')->firstOrFail();
        return view('yellowpages::VCard.CardView', compact('vcard'));
    }
    
    public function generateQrCode()
    {
        $userId = Auth::id();
        $vcard = Vcard::where('user_id', $userId)->latest()->first();
        if(!$vcard){
            return redirect()->route('vCard.createCard')->with('message', 'No VCard found for this user. Please create a new one.');
        }
        
        $vcardId= $vcard->id;
        // Generate QR code
        $qrCode = QrCode::size(200)->generate(route('vCard.scanView', ['qrCode' => $vcard->slug]));
        return view('yellowpages::VCard.QRvCard', compact('qrCode' ,'vcardId'));

    }
    
    // controller
    public function downloadQrCode()
    {
        $userId = Auth::id();
        $vcard = Vcard::where('user_id', $userId)->latest()->firstOrFail();
    
        // Generate QR code
        $qrCode = QrCode::size(200)->generate(route('vCard.scanView', ['qrCode' => $vcard->slug]));
    
        // Create a temporary file to store the QR code image
        $tempFile = tempnam(sys_get_temp_dir(), 'qr_'); 
        file_put_contents($tempFile, $qrCode);
    
        return response()->download($tempFile, 'vcard_qr_code.png')->deleteFileAfterSend(true);

    }
    

public function scanAndView($qrCode, $count = 1)
{

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
}

public function plan()
{
    $userPlanId = Auth::user()->plan_id;
    // Fetch Payment History
    $planHistory = PaymentHistory::where('plan_id', $userPlanId)->first();

    // Fetch Plan Details
    $planDetails = Plan::where('id', $userPlanId)->first();

    return view('yellowpages::Vcard.plan', compact('planHistory', 'planDetails'));
}

public function planDetails()
{
    $plans = Plan::all();
    $userPlanId = Auth::user()->plan_id;
    return view("yellowpages::Vcard.planDetails", compact('plans', 'userPlanId'));
}


public function stripeCheckout(Request $request)
{
    $plan = Plan::findOrFail($request->plan_id);
    // try {
        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

        $checkoutSession = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'INR',
                    'product_data' => [
                        'name' => $plan->name,
                    ],
                    'unit_amount' => $plan->price * 100, // Amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('yellow-pages/vCard/payment-success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => url('yellow-pages/vCard/payment-cancel'),
            'metadata' => [
                'plan_id' => $plan->id,
            ],
        ]);

        // Redirect user to Stripe Checkout
        return redirect($checkoutSession->url);
    // } catch (\Exception $e) {
    //     return redirect()->back()->with('error', 'Stripe error: ' . $e->getMessage());
    // }
}

public function paymentSuccess(Request $request)
{
    try {
        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
        $session = $stripe->checkout->sessions->retrieve($request->session_id);

        if (!$session) {
            return redirect()->back()->with('error', 'Invalid session ID');
        }

        // Access the plan_id from the metadata
        $plan_id = $session->metadata->plan_id ?? null;

        // Save payment history in the database
        PaymentHistory::create([
            'user_id' => auth::id(),
            'plan_id' => $plan_id,
            'transaction_id' => $session->payment_intent,
            'amount' => $session->amount_total / 100,
            'currency' => $session->currency,
            'status' => $session->payment_status,
        ]);

        User::where('id', Auth::id())->update(['plan_id' => $plan_id]);
       

        return redirect()->route('vCard.planDetails')->with('success', 'Payment successful and plan activated!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Stripe error: ' . $e->getMessage());
    }
}


public function paymentCancel()
{
    return redirect()->route('vCard.planDetails')->with('error', 'Payment was canceled.');
}
public function paymentHistory()
{
    $paymentHistories = PaymentHistory::with('plan')->get(); // Assuming 'plan' relationship exists
    return view('yellowpages::Vcard.payment_history', compact('paymentHistories'));
}
}

