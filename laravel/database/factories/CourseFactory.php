<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'image_path' => $this->faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Course $course) {

            $professorIds = Professor::inRandomOrder()->take(3)->pluck('id')->toArray();
            $course->professors()->attach($professorIds);

            $assistantIds = Professor::inRandomOrder()->take(2)->pluck('id')->toArray();
            $course->studentAssistants()->attach($assistantIds);
        });
    }
}
