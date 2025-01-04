<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mtag extends Model
{
    protected $table = 'mtag';

    protected $fillable = ['tagId', 'tagInEnglish'];

    public function chittis()
    {
        return $this->belongsToMany(Chitti::class, 'chitti_tag_mapping', 'tagId', 'chittiId');
    }
}
