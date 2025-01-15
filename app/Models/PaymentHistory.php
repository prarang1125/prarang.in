<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $connection = 'yp';

    protected $table = 'payment_history'; 

    protected $fillable = [
        'user_id',
        'plan_id',
        'transaction_id',
        'amount',
        'currency',
        'status'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
