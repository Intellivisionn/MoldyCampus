<?php
namespace Tests\Feature;

use App\Models\User;
use App\Models\Course;
use App\Models\Professor;
use App\Models\Major;
use App\Models\CourseRating;
use Tests\TestCase;

class ModelExistsTest extends TestCase
{
    public function test_user_model_exists_in_database()
    {
        // Create a user using the factory
        $user = User::factory()->create();

        // Assert that the user exists in the database
        $this->assertModelExists($user);
    }

    public function test_course_model_exists_in_database()
    {
        // Create a course using the factory
        $course = Course::factory()->create();

        // Assert that the course exists in the database
        $this->assertModelExists($course);

    }

    public function test_professor_model_exists_in_database()
    {
        // Create a professor using the factory
        $professor = Professor::factory()->create();

        // Assert that the professor exists in the database
        $this->assertModelExists($professor);
    }

    public function test_major_model_exists_in_database()
    {
        // Create a major using the factory
        $major = Major::factory()->create();

        // Assert that the major exists in the database
        $this->assertModelExists($major);
    }

    public function test_course_rating_model_exists_in_database()
    {
        // Create a course rating using the factory
        $courseRating = CourseRating::factory()->create();

        // Assert that the course rating exists in the database
        $this->assertModelExists($courseRating);
    }
}
