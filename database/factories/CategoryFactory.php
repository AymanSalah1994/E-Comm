<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 1),
            'popular' => $this->faker->numberBetween(0, 1),
            'keywords' => $this->faker->text(),
            'category_picture' => "https://res.cloudinary.com/divmlcuds/image/upload/v1683386390/place_holders/thumb_nbraq1.jpg", 
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
