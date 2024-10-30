<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Chatify\Traits\UUID;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    public function carts() {
        return $this->hasMany(Cart::class);
    }
    public function orders() {
        return $this->hasMany(Order::class);
    }
    public function addresses() {
        return $this->hasMany(Address::class);
    }
    public function mainAddress() {
        return $this->belongsTo(Address::class, 'address_id');
    }
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    // In User.php
public function favorites()
{
    return $this->belongsToMany(User::class, 'favorites', 'user_id', 'favorite_user_id');
}


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'address_id',
        'image_src',
        'gender',
        'birthday'

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

        // app/Models/User.php

    public function getNameAttribute()
{
    return $this->first_name . ' ' . $this->last_name;
}




}
