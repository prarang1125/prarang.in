<?php

namespace Modules\Portal\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Portal\Database\Factories\PortalFactory;

class Portal extends Model
{
    use HasFactory;


    protected $connection = 'main';
    protected $fillable = [
        'slug',
        'city_id',
        'city_code',
        'city_slogan',
        'map_link',
        'weather_widget_code',
        'sports_widget_code',
        'news_widget_code',
        'local_matrics',
    ];
}
