<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortalLocaleizetion extends Model
{
    protected $guarded = ['*'];


    protected $casts = [
        'json' => 'array',
    ];
}
