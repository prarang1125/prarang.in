<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Savelisting extends Model
{
    protected $connection = 'yp';
    protected $table = 'save_business'; 

    protected $fillable = ['user_id', 'business_id'];
}
