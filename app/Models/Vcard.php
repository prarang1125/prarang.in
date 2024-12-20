<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vcard extends Model
{
    protected $connection = 'yp';
    protected $table = 'vcard'; 

    protected $fillable = [
        'color_code', 
        'slug', 
        'banner_img', 
        'logo', 
        'title', 
        'subtitle', 
        'description'
    ];

}
