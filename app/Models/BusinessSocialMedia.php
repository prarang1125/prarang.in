<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessSocialMedia extends Model
{
    protected $connection = 'yp';
    protected $table = 'listing_social_id'; 

    protected $fillable = [
        'listing_id', 'social_id', 'description', 
    ];
}
