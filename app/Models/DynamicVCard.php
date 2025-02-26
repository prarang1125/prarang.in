<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicVCard extends Model
{
    protected $connection = 'yp';
    protected $table = 'dynamic_vcard_data'; 

    protected $fillable = ['vcard_id', 'title', 'data','icon'];
//   x
}
