<?php

namespace Database\Factories;

use App\Models\Section;
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
            "name:en" => $this->faker->name,
            "name:ar" => $this->faker->name,
            // 'appointments' => json_encode($this->faker->randomElements(['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'], 3)),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'section_id' => Section::all()->random()->id,
            'password' => Hash::make('password'),
            'phone' => $this->faker->phoneNumber(),
            'price' => $this->faker->randomElement([100, 200, 300, 400, 500]), // Adjust range as necessary
            'photo' => $this->faker->imageUrl(640, 480, 'people'), // توليد مسار صورة عشوائية

        ];
    }
}
