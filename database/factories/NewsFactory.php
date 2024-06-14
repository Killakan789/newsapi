<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $text = fake()->text(90);
        $truncated = Str::of($text)->limit(20);
        return [
            'title' => fake()->title(),
            'url' => fake()->url(),
            'short_desc' => $truncated,
            'description' => $text,
            'status' => fake()->randomElement(['active', 'hidden']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
