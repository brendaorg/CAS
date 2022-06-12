<?php

namespace Database\Factories;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{  
  protected $model = \App\Models\Course::class;


   public function definition()
    {
        return [
          'uuid' => $this->faker->uuid(),
          'course_name' => $this->faker->word,
          'course_code' => $this->faker->lexify('id-????'),
          'periodic_time' => $this->faker->numberBetween(1, 3),
          'venue_name' => $this->faker->word,
          'created_at' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }

}
