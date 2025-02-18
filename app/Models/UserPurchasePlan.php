<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPurchasePlan extends Model
{
    protected $connection = 'yp';
    protected $table = 'user_purchase_plans';

    protected $fillable = ['plan_id', 'user_id', 'purchased_at', 'expires_at','amount','payment_status','transaction_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    

}
