<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseStudentAssistantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => Course::factory(),
            'student_assistant_id' => Professor::factory(),
        ];
    }
}
