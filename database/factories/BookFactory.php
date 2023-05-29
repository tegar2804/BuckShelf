<?php

namespace Database\Factories;

use Illuminate\Console\View\Components\Choice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cover = ["cover-images/book1.png", "cover-images/book2.png", "cover-images/book3.png"];
        return [
            'isbn' => fake()->isbn13(),
            'author_id' => fake()->numberBetween(1,3),
            'title' => fake()->sentence(mt_rand(2,8)),
            'slug' => fake()->slug(),
            'price' => (fake()->numberBetween(30,150))*1000,
            'desc' => fake()->paragraph(),
            'cover' => $cover[array_rand($cover)],
            'published_at' => now()
        ];
    }
}
