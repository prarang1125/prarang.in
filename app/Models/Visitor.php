<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $connection = 'main';

    protected $table = 'visitors';
    protected $fillable = [
        'post_city',
        
        'post_id',
        'current_url',
        'ip_address',
        'latitude',
        'longitude',
        'language',
        'screen_width',
        'screen_height',
        'timestamp',
        'user_agent',
        'visit_count',
        'visitor_city',
        'visitor_address',
        'referrer',
        'duration',
        'scroll',
        'user_type',
    ];
}
