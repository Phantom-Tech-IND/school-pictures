<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'message' => $this->faker->text,
            'subject' => $this->faker->sentence,
            'appointment_date' => $this->faker->date,
            'appointment_time' => $this->faker->time,
            'interests' => json_encode($this->faker->words(5)),
        ];
    }
}
