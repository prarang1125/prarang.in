<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessProduct extends Model
{
    protected $connection = 'yp';
    protected $table = 'business_products';

    protected $fillable = [
        'business_listing_id',
        'product_name',
        'description',
        'price',
        'purchase_url',
        'image1',
        'image2',
        'image3',
        'status',
    ];

    /**
     * Get the business listing that owns the product.
     */
    public function businessListing()
    {
        return $this->belongsTo(BusinessListing::class, 'business_listing_id');
    }
}
