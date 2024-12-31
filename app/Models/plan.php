<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $connection = 'yp';
    protected $table = 'subscription_plans'; 

    protected $fillable = ['name', 'description', 'price','duration','is_active'];

}
