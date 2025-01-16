<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    protected $connection = 'yp';
    protected $table = 'visits'; 

    protected $fillable = [
        'business_id', 
        'ip_address', 
        'user_type', 
        'username', 
        'created_at', 
        'updated_at', 
    ];
}
