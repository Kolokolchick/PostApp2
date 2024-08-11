<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $date = null;
        $date = $date ? $date->addDay() : now()->subYear();

        return [
            'title' => $this->faker->text(100),
            'body' => $this->faker->paragraphs(rand(3, 7), true),
            'author_id' => User::inRandomOrder()->value('id'),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
