<?php

namespace Database\Factories;

use App\Models\Category;
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
            'product_type' => $this->faker->randomElement(['personal', 'school']),
            'name' => $this->faker->words(3, true),
            'tags' => $this->faker->words(3, true),
            'price' => $this->faker->randomFloat(2, 10, 1000), // Price between 10 and 1000
            'description' => $this->faker->paragraph,
            'images' => [$this->faker->imageUrl(640, 480), $this->faker->imageUrl(640, 480)],
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($product) {
            $categories = Category::inRandomOrder()->take(rand(1, 4))->pluck('id');
            $product->categories()->attach($categories);
        });
    }
}
