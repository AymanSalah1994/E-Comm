<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{

    public function run()
    {
        Category::factory(5)->create() ; 
    }
}
