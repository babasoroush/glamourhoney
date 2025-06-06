<?php

namespace App\Modules\Common\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Common\Models\category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class categoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'CategoryType' => 'product'
        ];
    }
}
