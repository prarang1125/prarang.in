<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertisingPrice extends Model
{
    protected $connection = 'yp';
    protected $table = 'monthly_advertising_prices'; 
}
