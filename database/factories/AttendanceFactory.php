<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
         return [
             'user_id' => \App\Models\User::inRandomOrder()->first()->id,
             'course_id' => \App\Models\Course::inRandomOrder()->first()->id,
             'date' => $this->faker->dateTimeBetween('-1 week', '+1 week')->format('Y-m-d'),
             'timein' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
             'status' => 1
        ];

    }
}
