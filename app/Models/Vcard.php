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
        'user_id',
        'category_id',
        'city_id',
        'address_id',
        'aadhar_front',
        'aadhar_back',

    ];

    public function dynamicFields()
{
    return $this->hasMany(DynamicVcard::class, 'vcard_id');
}

// Vcard model
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function address()
{
    return $this->belongsTo(Address::class, 'address_id');
}



}
