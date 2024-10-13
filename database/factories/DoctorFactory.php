<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name:en"=> $this->faker->name,
            'appointments:en'=> $this->faker->randomElement(['saturday','sunday','monday','tuesday','wendnesday','thursday','friday']),
            "name:ar" => $this->faker->name,
            'appointments:ar' => $this->faker->randomElement(['saturday', 'sunday', 'monday', 'tuesday', 'wendnesday', 'thursday', 'friday']),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => $this->faker->phoneNumber(),
            'price' => $this->faker->randomElement([100, 200,300,400, 500]), // Adjust range as necessary

        ];
    }
}
