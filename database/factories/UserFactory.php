<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $order = 2;

    public function definition()
    { 
        return [
            'first_name' => $this->faker->firstName($gender = 'male'),
            'middle_name' => $this->faker->lastName($gender = 'male'),
            'last_name' => $this->faker->lastName($gender = 'male'),
            'usertype' => 'Student',
            'email' => $this->faker->unique()->safeEmail(),
            'program_id' =>  \App\Models\Program::inRandomOrder()->first()->id,
            'status' => 1,
            'registration_number' => Str::random(6),
            'gender' => 'male',
            'password' => bcrypt($this->faker->password(10)),
            'cas_id' => self::$order++,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
