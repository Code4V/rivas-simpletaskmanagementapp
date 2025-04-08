<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tasks>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->paragraph(1),
            'duedate' => fake()->dateTimeBetween('now', '30 days'), 
            'isdeleted' => fake()->boolean(0),
            'iscomplete' => fake()->boolean(10)
        ];
    }
}
