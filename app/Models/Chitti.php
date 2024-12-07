<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chitti extends Model
{
    protected $table = 'chitti'; // table name

    public function chittiGeographies()
    {
        return $this->hasMany(ChittiGeography::class, 'chittiId', 'chittiId');
    }

    public function images()
    {
        return $this->hasMany(ChittiImageMapping::class, 'chittiId', 'chittiId');
    }
    public function tagMappings()
    {
        return $this->hasMany(ChittiTagMapping::class, 'chittiId', 'chittiId');
    }
   


}
