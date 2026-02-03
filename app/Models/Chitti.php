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

    public function geography()
    {
        return $this->hasOne(ChittiGeography::class, 'chittiId', 'chittiId');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_value', 'id');
    }

    public function repost()
    {
        return $this->hasOne(
            Chitti::class,
            're_upload_chittid', // FK in child
            'chittiid'           // PK in this row
        );
    }
    public function reposts()
    {
        return $this->hasMany(
            Chitti::class,
            're_upload_chittid',
            'chittiId'
        )->where('finalStatus', 'approved');
    }
}
