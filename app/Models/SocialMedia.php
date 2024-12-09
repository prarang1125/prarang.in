<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $connection = 'yp';
    protected $table = 'social_media_platforms'; 
}
