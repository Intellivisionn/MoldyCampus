<?php

namespace Database\Factories;

use App\Models\CourseRating;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseRatingFactory extends Factory
{
    protected $model = CourseRating::class;

    public function definition()
    {
        //$course = \App\Models\Course::factory()->create(); //useless, we cant read the values for some reason
        //$user = \App\Models\User::factory()->create(); //when generating users, we dont set the uuid, but the id is generated from the db automatically

        return [
            'id' => $this->faker->uuid,
            'course_id' => '9f72063f-752e-3458-ad78-16f3bdbf0b6f', //$course->id, //-> this cant be because the value will be 0
            'user_id' => $this->faker->numberBetween(1, 10), // at least 10 users in the database required to run this
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'review' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
