<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChittiGeography extends Model
{
    protected $table = 'vChittiGeography'; // table name

    public function geography()
    {
        return $this->belongsTo(Geography::class, 'geographycode', 'geographycode');
    }

    public function chitti()
    {
        return $this->belongsTo(Chitti::class, 'chittiId', 'chittiId');
    }

    //     public function portal()
    // {
    //     return $this->belongsTo(Portal::class, 'Geography', 'city_code');
    // }
    public function portal()
    {
        return $this->hasOne(Portal::class, 'city_code', 'Geography');
    }
}
