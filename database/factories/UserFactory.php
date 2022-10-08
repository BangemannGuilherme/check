<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->username(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'rfid' => Str::random(6),
            'code' => Str::random(6),
            'remember_token' => Str::random(10),
            'admin' => false
        ];
    }
}
