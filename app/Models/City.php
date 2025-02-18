<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $connection = 'yp';

    protected $table = 'cities';

    protected $fillable = [
        'name',
        'cities_url',
        'portal_id',
        'timezone',
        'created_at',
        'updated_at'
    ];
    public function portal()
    {
        return $this->belongsTo(Portal::class, 'portal_id');
    }
}
