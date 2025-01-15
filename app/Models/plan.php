<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserPurchasePlan;


class plan extends Model
{
    protected $connection = 'yp';
    protected $table = 'plan';

    protected $fillable = ['name', 'description', 'price','duration','type','is_active'];

    public function subscriptions()
    {
        return $this->hasMany(UserPurchasePlan::class, 'plan_id', 'id');
    }

}
