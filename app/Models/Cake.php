<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'cake_tag');
    }
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}
