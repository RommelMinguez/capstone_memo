<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    public static function allCake() : array
    {
        return [
            [
                'id' => 1,
                'image' => 'images/cakes/memo-cake (1).jpg',
                'name' => 'Cake 1',
                'price' => 250.50,
            ],
            [
                'id' => 2,
                'image' => 'images/cakes/memo-cake (2).jpg',
                'name' => 'Cake 2',
                'price' => 275.50,
            ],
            [
                'id' => 3,
                'image' => 'images/cakes/memo-cake (3).jpg',
                'name' => 'Cake 3',
                'price' => 300.50,
            ],
            [
                'id' => 4,
                'image' => 'images/cakes/memo-cake (4).jpg',
                'name' => 'Cake 4',
                'price' => 300.50,
            ],
            [
                'id' => 5,
                'image' => 'images/cakes/memo-cake (5).jpg',
                'name' => 'Cake 5',
                'price' => 300.50,
            ],
        ];
    }
}
