<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChittiImageMapping extends Model
{
    protected $table = 'chittiimagemapping'; // table name

    public function chitti()
    {
        return $this->belongsTo(Chitti::class, 'chittiId', 'chittiId');
    }
    
}
