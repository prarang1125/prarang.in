<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyTurnover extends Model
{
    protected $connection = 'yp';
    protected $table = 'monthly_turnovers'; 
}
