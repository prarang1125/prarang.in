<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'mtag'; // table name

    public function chittiTagMappings()
    {
        return $this->hasMany(ChittiTagMapping::class, 'tagId', 'tagId');
    }
}
