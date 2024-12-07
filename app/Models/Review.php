<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Review extends Model
{
    use HasFactory;

    protected $connection = 'yp';

    protected $table = 'review';
    protected $fillable = [
        'user_id', 'listing_id', 'cleanliness', 'service',
        'ambience', 'price', 'title', 'review', 'image',
    ];

    // Define the relationship with the BusinessListing model
    public function listing()
    {
        return $this->belongsTo(BusinessListing::class);
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
