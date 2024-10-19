<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name:ar' => $this->faker->randomElement([
                'قسم الجراحه',
                'قسم الطواري',
                'قسم المخ والاعصاب',
                'قسم الاشعه',
                'قسم المختبر'
            ]),
            'name:en' => $this->faker->randomElement([
                'Surgery Department',
                'Emergency Department',
                'Neurology Department',
                'Radiology Department',
                'Laboratory Department'
            ]),


        ];
    }
}
