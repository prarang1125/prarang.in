<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessFaq extends Model
{
    protected $connection = 'yp';
    protected $table = 'listing_faq'; 

    protected $fillable = [
        'listing_id', 'question', 'answer', 
    ];
}
