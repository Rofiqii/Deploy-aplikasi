<?php

namespace Database\Factories;

use App\Models\InitialAssessment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VitalSign>
 */
class VitalSignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'assessment_id' => $this->faker->numberBetween(1, 5), 
            'temperature' => $this->faker->randomFloat(1, 35.0, 42.0),
            'heart_rate' => $this->faker->numberBetween(60, 100),
            'respiratory_rate' => $this->faker->numberBetween(12, 20),
            'weight' => $this->faker->randomFloat(2, 30.0, 150.0),
            'status_condition' => $this->faker->randomElement(['Sehat', 'Tidak Sehat']),
        ];
    }
}
