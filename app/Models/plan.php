<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $connection = 'yp';
    protected $table = 'plan';

    protected $fillable = ['name', 'description', 'price','duration','type','is_active'];

}
