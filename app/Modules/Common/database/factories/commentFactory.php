<?php

namespace App\Modules\Common\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Common\Models\Comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class commentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph(mt_rand(1, 3)),
            'user_id' => $this->faker->numberBetween(1, 2),
            'status' => $this->faker->randomElement([1, 0]),
        ];
    }
}
