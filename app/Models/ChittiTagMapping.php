<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChittiTagMapping extends Model
{
    protected $table = 'chittitagmapping'; // table name

    public function chitti()
    {
        return $this->belongsTo(Chitti::class, 'chittiId');
    }
    
    public function tag()
    {
        return $this->belongsTo(Mtag::class, 'tagId', 'tagId');  // Assuming 'tagId' is the foreign key in ChittiTagMapping and 'tagId' is the primary key in Mtag
    }
    // Assuming post belongs to a user
    
}
