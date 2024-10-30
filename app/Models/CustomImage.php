<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customOrder() {
        return $this->belongsTo(CustomOrder::class);
    }
}
