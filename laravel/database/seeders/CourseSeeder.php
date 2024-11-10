<?php

use App\Models\Course;
use App\Models\CourseProfessor;
use App\Models\CourseRating;
use App\Models\CourseStudentAssistant;
use App\Models\Professor;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 courses
        Course::factory()->count(10)->create()->each(function ($course) {
            // Create professors and student assistants for each course
            $professors = Professor::factory()->count(3)->create();
            $studentAssistants = Professor::factory()->count(2)->create();

            // Attach professors to the course
            foreach ($professors as $professor) {
                CourseProfessor::factory()->create([
                    'course_id' => $course->id,
                    'professor_id' => $professor->id,
                ]);
            }

            // Attach student assistants to the course
            foreach ($studentAssistants as $studentAssistant) {
                CourseStudentAssistant::factory()->create([
                    'course_id' => $course->id,
                    'student_assistant_id' => $studentAssistant->id,
                ]);
            }

            // Create course ratings
            CourseRating::factory()->count(5)->create([
                'course_id' => $course->id,
            ]);
        });
    }
}
