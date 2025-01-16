<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicFeild extends Model
{
    protected $connection = 'yp';
    protected $table = 'dynamic_fields'; 

    protected $fillable = [
        'name', 
        'type', 
        'icon', 
        'is_active', 
    ];
}
