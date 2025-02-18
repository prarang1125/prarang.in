<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeRange extends Model
{
    protected $connection = 'yp';
    protected $table = 'number_of_employees'; 
}
