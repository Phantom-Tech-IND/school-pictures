<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_type' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 1000), // Price between 10 and 1000
            'description' => $this->faker->paragraph,
            'photo' => 'products/'.$this->faker->image('public/storage/products', 640, 480, null, false), // Save image to public storage and return the filename
        ];
    }
}
