<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PanditFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile' => $this->faker->phoneNumber(),
            'location' => $this->faker->city(),
            'photo' => $this->faker->imageUrl(200, 200, 'people'),
            'dob' => $this->faker->date('Y-m-d', '-20 years'),
            'experties' => $this->faker->paragraph(),
        ];
    }
}

