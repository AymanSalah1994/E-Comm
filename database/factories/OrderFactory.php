<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::where('role_as', '0')->pluck('id')->random(),
            'status' => $this->faker->numberBetween(0, 5),
            /*
            0 -> Unckecked , 1 -> Checked
            2 -> InPreparation , 3 -> Cancelled
            4 -> Done  , 5 -> ReFunded
            */
            'tracking_id' => Str::random(7),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
