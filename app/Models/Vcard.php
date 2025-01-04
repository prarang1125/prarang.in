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
        'description',
        'user_id'
    ];

    public function dynamicFields()
{
    return $this->hasMany(DynamicVcard::class, 'vcard_id');
}


    

}
