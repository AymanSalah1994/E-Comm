<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(7)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            // CategoriesSeeder::class,
            // ProductsSeeder::class,
            // OrderSeeder::class , 
            ReviewSeeder::class , 
        ]);
    }
}
