<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = Carbon::today()->subDays(rand(0, 365)); // Randomize creation date within the last year

        return [
            'uuid' => $this->faker->uuid,
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'time' => $this->faker->dateTimeBetween($createdAt->copy()->subYear(), $createdAt), // Ensure the order time is within a year before the created_at date
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'invoice' => $this->faker->word,
            'contact_id' => Contact::factory(),
            'created_at' => $createdAt,
            'updated_at' => Carbon::now(), // Set updated_at to now
        ];
    }
}
