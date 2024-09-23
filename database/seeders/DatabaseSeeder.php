<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cake;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();

        User::create([
            'first_name' => 'admin',
            'last_name'  => 'admin',
            'email' => 'admin@admin',
            'phone_number' => '1234567890',
            'password' => 'admin123',
            'address' => 'admin',
            'is_admin' => true
        ]);

        Cake::factory(5)->create();

        // Cake::factory()->create([
        //     'name' => 'cake 1',
        //     'description' => 'this is a cake',
        //     'price' => 140,
        //     'image_src' => '/images/cakes/memo-cake (1).jpg',
        // ]);
        // Cake::factory()->create([
        //     'name' => 'cake 2',
        //     'description' => 'this is a cake',
        //     'price' => 140,
        //     'image_src' => '/images/cakes/memo-cake (2).jpg',
        // ]);
        // Cake::factory()->create([
        //     'name' => 'cake 3',
        //     'description' => 'this is a cake',
        //     'price' => 140,
        //     'image_src' => '/images/cakes/memo-cake (3).jpg',
        // ]);
        // Cake::factory()->create([
        //     'name' => 'cake 4',
        //     'description' => 'this is a cake',
        //     'price' => 140,
        //     'image_src' => '/images/cakes/memo-cake (4).jpg',
        // ]);
        // Cake::factory()->create([
        //     'name' => 'cake 5',
        //     'description' => 'this is a cake',
        //     'price' => 140,
        //     'image_src' => '/images/cakes/memo-cake (5).jpg',
        // ]);
    }
}
