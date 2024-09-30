<?php

namespace Database\Seeders;

use App\Models\Tag;
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
            'image_src' => 'public/images/default/new-memo-logo.jpg',
            'is_admin' => true
        ]);

        Cake::factory(5)->create();

        Tag::create([
           'name' => 'Birthday',
           'category' => "EVENT"
        ]);
        Tag::create([
           'name' => 'Anniversary',
           'category' => "EVENT"
        ]);
        Tag::create([
           'name' => 'Wedding',
           'category' => "EVENT"
        ]);
        Tag::create([
           'name' => 'Graduation',
           'category' => "EVENT"
        ]);
        Tag::create([
           'name' => 'Holiday',
           'category' => "EVENT"
        ]);
    }
}
