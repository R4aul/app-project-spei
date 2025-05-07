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
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
        $id = collect(str_split($characters))
            ->random(5)
            ->implode('');
        return [
            'name_employee' => fake()->name(),
            'id_employee' => $id,
            'email' => fake()->email(),
            'status'=>true,
            'profile_id'=>fake()->numberBetween(1,12),
            'cell_id'=>fake()->numberBetween(1, 10)
        ];
    }
}
