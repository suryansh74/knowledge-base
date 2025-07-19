<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(\App\Models\User::pluck('id')->toArray()),
            'problem_id' => fake()->randomElement(\App\Models\Problem::pluck('id')->toArray()),
            'content' => $this->faker->optional()->paragraph(),
        ];
    }
}
