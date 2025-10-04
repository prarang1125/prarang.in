<?php

namespace Modules\Portal\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CountryPortal extends Model
{
    use HasFactory;

    protected $connection = 'main';
    protected $guarded = [];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'important_links' => 'array',
    ];
}
