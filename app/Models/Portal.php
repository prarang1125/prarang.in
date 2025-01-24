<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    protected $table = 'portals';

    public function geography()
    {
        return $this->belongsTo(ChittiGeography::class, 'city_code', 'geography');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
