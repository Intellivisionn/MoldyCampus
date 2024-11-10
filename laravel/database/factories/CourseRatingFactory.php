<?php

namespace Database\Factories;

use App\Models\CourseRating;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseRatingFactory extends Factory
{
    protected $model = CourseRating::class;

    public function definition()
    {
        $course = \App\Models\Course::inRandomOrder()->first() ?? \App\Models\Course::factory()->create();
        $user = \App\Models\User::inRandomOrder()->first() ?? \App\Models\User::factory()->create();

        return [
            'id' => $this->faker->uuid,
            'course_id' => $course->id,
            'user_id' => $user->id,
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'review' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
