<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'product_id' => Product::pluck('id')->random(),
            'rating_stars' => $this->faker->numberBetween(0, 5),
            'rating_text' => $this->faker->text(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
