<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->words(3, true), // e.g., 'Advanced Quantum Mechanics'
            'code' => strtoupper($this->faker->bothify('??? ###')), // e.g., 'PHY 201'
            'lecturer' => $this->faker->name('male'|'female'), // Random lecturer name
            'image' => $this->faker->imageUrl(640, 480, 'education', true, 'Course'), // Placeholder image URL
        ];
    }
}
