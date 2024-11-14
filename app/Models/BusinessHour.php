<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
     protected $connection = 'yp';
    protected $table = 'business_hours'; 

   protected $fillable = [

    'business_id', 'day', 'open_time', 'close_time', 'open_time_2', 'close_time_2', 'is_24_hours', 'add_2nd_time_slot'
    
];

}
