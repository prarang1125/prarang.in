<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserPurchasePlan;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;
    protected $connection = 'yp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'password',
        'role',
        'is_active',
        'dob',
        'aadhar',
        'city_id',
        'profile',
        'user_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function subscriptions()
    {
        return $this->hasMany(UserPurchasePlan::class, 'user_id', 'id')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc');  // or order it as per your preference
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'user_id');
    }

    public function vcard()
    {
        return $this->hasMany(VCard::class, 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
