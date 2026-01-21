<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class City extends Model
{
    protected $connection = 'yp';

    protected $table = 'cities';

    protected $fillable = [
        'name',
        'city_arr',
        'city_slug',
        'cities_url',
        'cover',
        'portal_id',
        'is_country',
        'country',
        'timezone',
        'created_at',
        'updated_at'
    ];

    protected static function booted()
    {
        static::addGlobalScope('only_country', function (Builder $builder) {
            if (app()->getLocale() == 'en') {
                $builder->where('is_country', true);
            } else {
                $builder->where('is_country', false);
            }
        });
    }
    public function portal()
    {
        return $this->belongsTo(Portal::class, 'portal_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'city_id');
    }
}
