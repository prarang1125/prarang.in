<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 👈 import this

class Portal extends Model
{
     use SoftDeletes;
    protected $table = 'portals';
  protected $dates = ['deleted_at'];
    public function geography()
    {
        return $this->belongsTo(ChittiGeography::class, 'city_code', 'geography');
    }

    public function city()
{
    return $this->hasOne(City::class, 'portal_id', 'id');
}

}
