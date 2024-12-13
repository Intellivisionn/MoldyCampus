<?php

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Professor;
use App\Models\Course;
use App\Models\CourseRating;

class ProfessorPageTest extends TestCase
{
    public function test_mount_initializes_correctly()
    {
        // Assume that the database seeding ensures at least one professor exists with ID 1
        $professor = Professor::find(1);
        $this->assertNotNull($professor, 'No seeded professor found with ID 1.');

        Livewire::test(\App\Livewire\Pages\Professor::class, ['professorId' => $professor->id])
            ->assertSet('professorId', $professor->id);
    }

    // public function test_render_retrieves_professor_and_courses()
    // {
    //     $professor = Professor::factory()->create();
    //     $course = Course::factory()->create();
    //     $professor->courses()->attach($course);

    //     Livewire::test(\App\Livewire\Pages\Professor::class, ['professorId' => $professor->id])
    //         ->assertViewHas('professor', $professor)
    //         ->assertViewHas('courses', function ($courses) use ($course) {
    //             return count($courses) === 1 && $courses[0]['id'] === $course->id;
    //         });
    // }


    public function test_render_handles_no_reviews()
    {
        $professor = Professor::factory()->create();

        Livewire::test(\App\Livewire\Pages\Professor::class, ['professorId' => $professor->id])
            ->assertViewHas('finalRating', 0); // No reviews, average should be 0
    }


    public function test_empty_state_for_courses()
    {
        $professor = Professor::factory()->create();

        Livewire::test(\App\Livewire\Pages\Professor::class, ['professorId' => $professor->id])
            ->assertViewHas('courses', []); // Professor has no courses
    }
}

