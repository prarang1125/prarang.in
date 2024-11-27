<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BusinessListing extends Model
{
    protected $connection = 'yp';
    protected $table = 'business_listings'; 

    protected $fillable = [
        'city_id',
        'listing_title',
        'tagline' ,
        'business_name' ,
        'business_address',
        'primary_phone' ,
        'secondary_phone',
        'primary_contact_name',
        'primary_contact_email',
        'secondary_contact_name',
        'secondary_contact_email',
        'legal_type_id',
        'employee_range_id',
        'turnover_id',
        'advertising_medium_id',
        'advertising_price_id',
        'category_id',
        'full_address',
        'website',
        'phone',
        'whatsapp',
        'notification_email',
        'user_name',
        'faq',
        'answer' ,
        'description',
        'tags_keywords',
        'social_id',
        'social_media_description',
        'pincode',
        'logo',
        'feature_img',
        'business_img',
        'email',
        'password',
        'agree', 

    ];


    public function hours()
    {
        return $this->hasOne(BusinessHour::class, 'business_id');
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
