<?php

namespace Database\Factories;

use App\Models\Sheep;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sheep>
 */
class SheepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'sheep_name' => preg_replace('/\s+[A-Z]{1,3}\.?([A-Z]{1,3}\.?)*$/', '', $this->faker->unique()->name),
            'sheep_birth' => $this->faker->dateTimeBetween('2020-01-01', Carbon::now())->format('Y-m-d'),
            // 'sheep_type' => $this->faker->randomElement(['Induk', 'Anak']),
            'sheep_gender' => $this->faker->randomElement(['Betina', 'Jantan']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
