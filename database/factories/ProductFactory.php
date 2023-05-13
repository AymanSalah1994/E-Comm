<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'category_id' => Category::pluck('id')->random(),
            'user_id' => User::where('role_as', '2')->pluck('id')->random(),  // User ID refer to the Creator , Not Customer 
            'name' => $this->faker->name(),
            'quantity' => $this->faker->randomDigit(),
            'description' => $this->faker->text(),
            'small_description' => $this->faker->text(),
            'original_price' => $this->faker->randomDigit(),
            'selling_price' => $this->faker->randomDigit(),
            'keywords' => $this->faker->name(),
            'status' => $this->faker->numberBetween(0, 1),
            'trending' => $this->faker->numberBetween(0, 1),
            'refundable' => $this->faker->numberBetween(0, 1),
            'slug' => $this->faker->slug(),
            'product_picture' => asset('images/240x320.png'),
            'secondary_picture' => asset('images/240x320.png'),
            // asset('images/240x320.png')
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
