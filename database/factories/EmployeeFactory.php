<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_employee' => fake()->name(),
            'email' => fake()->email(),
            'status'=>true,
            'profile_id'=>fake()->numberBetween(1,12),
            'cell_id'=>fake()->numberBetween(1, 10)
        ];
    }
}
