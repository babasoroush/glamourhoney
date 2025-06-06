<?php

namespace App\Modules\Common\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Common\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    protected $model = Image::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => 'images/' . $this->faker->word() . '_' . $this->faker->randomNumber(4) . '.jpg',
        ];
    }
}
