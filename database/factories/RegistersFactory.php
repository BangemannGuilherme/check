<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegistersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_id' => $this->faker->unique()->numberBetween(0, \App\Models\User::count()),
            'user_id' => 1,
            'register_time' => $this->faker->dateTime(),
            'type' => 'rfid',
        ];
    }
}
