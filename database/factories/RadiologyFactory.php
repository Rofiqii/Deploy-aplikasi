<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Radiology>
 */
class RadiologyFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'assessment_id' => $this->faker->numberBetween(1, 5), 
            'ultrasound_image' => $this->faker->imageUrl(640, 480, 'medical'),
            'gestational_age' => $this->faker->optional()->numberBetween(1, 40),
            'pregnancy_status' => $this->faker->randomElement(['Hamil', 'Tidak Hamil']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
