<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $connection = 'main';

    protected $table = 'visitors';
    protected $fillable = [
<<<<<<< HEAD
        'city',
=======
        'post_city',
        
>>>>>>> 6c12e62f19621255c39c824489c6c88135c24d20
        'post_id',
        'current_url',
        'ip_address',
        'latitude',
        'longitude',
        'language',
        'screen_width',
        'screen_height',
        'timestamp',
<<<<<<< HEAD
        'user_agent', // Assuming you want to store the user-agent as well
        'visit_count',
        'visitor_city',
        'visitor_address',
=======
        'user_agent',
        'visit_count',
        'visitor_city',
        'visitor_address',
        'referrer',
        'duration',
        'scroll',
        'user_type',
>>>>>>> 6c12e62f19621255c39c824489c6c88135c24d20
    ];
}
