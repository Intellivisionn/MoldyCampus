<?php

namespace Database\Factories;

use App\Models\CourseRating;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseRatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseRating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'course_id' => Course::factory(),
            'user_id' => User::factory(),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'review' => $this->faker->paragraph,
        ];
    }
}
