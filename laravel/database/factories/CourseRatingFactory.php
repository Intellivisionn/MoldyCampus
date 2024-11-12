<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseRating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseRatingFactory extends Factory
{
    protected $model = CourseRating::class;

    public function definition()
    {

        return [
            'course_id' => Course::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'review' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
