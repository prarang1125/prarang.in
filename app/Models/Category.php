<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $connection = 'yp';
    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'categories_url', 'created_at'];

}
