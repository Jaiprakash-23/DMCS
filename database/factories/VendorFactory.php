<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
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
