<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use App\Models\BusinessListing;
use App\Models\BusinessProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $businessListings = BusinessListing::where('user_id', Auth::id())->pluck('id');
        $products = BusinessProduct::whereIn('business_listing_id', $businessListings)->with('businessListing')->get();
        return view('yellowpages::Vcard.products.index', compact('products'));
    }

    public function create()
    {
        $businessListings = BusinessListing::where('user_id', Auth::id())->get();
        return view('yellowpages::Vcard.products.create', compact('businessListings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'business_listing_id' => 'required|exists:yp.business_listings,id',
            'product_name' => 'required|string|max:255',
            'price' => 'nullable|string|max:255',
            'purchase_url' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product = new BusinessProduct($request->except(['image1', 'image2', 'image3']));

        for ($i = 1; $i <= 3; $i++) {
            if ($request->hasFile("image$i")) {
                $image = $request->file("image$i");
                $filename = time() . "_product_{$i}_" . uniqid() . "." . $image->getClientOriginalExtension();
                $path = "yellowpages/products/" . $filename;

                // Resize and Crop to 800x800
                $img = Image::read($image);
                $img->cover(800, 800);

                Storage::disk('public')->put($path, (string) $img->encode());
                $product->{"image$i"} = $path;
            }
        }

        $product->save();

        return redirect()->route('vCard.products.index')->with('success', __('yp.product_added_successfully'));
    }

    public function edit($id)
    {
        $product = BusinessProduct::findOrFail($id);
        // Ensure user owns the business listing associated with the product
        if ($product->businessListing->user_id !== Auth::id()) {
            abort(403);
        }
        $businessListings = BusinessListing::where('user_id', Auth::id())->get();
        return view('yellowpages::Vcard.products.edit', compact('product', 'businessListings'));
    }

    public function update(Request $request, $id)
    {
        $product = BusinessProduct::findOrFail($id);
        if ($product->businessListing->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'business_listing_id' => 'required|exists:yp.business_listings,id',
            'product_name' => 'required|string|max:255',
            'price' => 'nullable|string|max:255',
            'purchase_url' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product->fill($request->except(['image1', 'image2', 'image3']));

        for ($i = 1; $i <= 3; $i++) {
            if ($request->hasFile("image$i")) {
                // Delete old image if exists
                if ($product->{"image$i"}) {
                    Storage::disk('public')->delete($product->{"image$i"});
                }

                $image = $request->file("image$i");
                $filename = time() . "_product_{$i}_" . uniqid() . "." . $image->getClientOriginalExtension();
                $path = "yellowpages/products/" . $filename;

                $img = Image::read($image);
                $img->cover(800, 800);

                Storage::disk('public')->put($path, (string) $img->encode());
                $product->{"image$i"} = $path;
            }
        }

        $product->save();

        return redirect()->route('vCard.products.index')->with('success', __('yp.product_updated_successfully'));
    }

    public function destroy($id)
    {
        $product = BusinessProduct::findOrFail($id);
        if ($product->businessListing->user_id !== Auth::id()) {
            abort(403);
        }

        for ($i = 1; $i <= 3; $i++) {
            if ($product->{"image$i"}) {
                Storage::disk('public')->delete($product->{"image$i"});
            }
        }

        $product->delete();

        return redirect()->route('vCard.products.index')->with('success', __('yp.product_deleted_successfully'));
    }
}
