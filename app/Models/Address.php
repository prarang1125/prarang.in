<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $connection = 'yp';
    protected $table = 'address';

    protected $fillable = [
        'user_id', 'house_number','street','area_name','city_id','state','postal_code','city_name','country',
    ];
    public function city()
{
    return $this->belongsTo(City::class); // assuming `city_id` is the foreign key
}
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
