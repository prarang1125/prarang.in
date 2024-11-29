<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Geography extends Model
{
    protected $table = 'vGeography'; // table name

    public function chittiGeographies()
    {
        return $this->hasMany(ChittiGeography::class, 'geographycode', 'geographycode');
    }
}
