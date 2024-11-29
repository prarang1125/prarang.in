<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChittiTagMapping extends Model
{
    protected $table = 'chittitagmapping'; // table name

    public function chitti()
    {
        return $this->belongsTo(Chitti::class, 'chittiId', 'chittiId');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tagId', 'tagId');
    }
}
