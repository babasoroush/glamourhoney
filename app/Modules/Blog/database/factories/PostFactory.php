<?php

namespace App\Modules\Blog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Blog\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'user_id' => fake()->numberBetween(1, 2),
            'category_id' => fake()->numberBetween(1, 3),
            'status' => 1,
            'body' => fake()->paragraph(2),
        ];
    }
}
