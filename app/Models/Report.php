<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $connection = 'yp';

    protected $table = 'report'; 

    protected $fillable = [
        'name',
        'business_email',
        'number',
        'message',
        'file',
    ];

}
