<?php

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\User;
use App\Models\Course as CourseModel;
use App\Models\CourseRating;

class CoursePageTest extends TestCase
{

    public function test_submit_rating_creates_new_review()
    {
        $user = User::factory()->create();
        $course = CourseModel::factory()->create();

        $this->actingAs($user);

        Livewire::test(\App\Livewire\Pages\Course::class, ['courseId' => $course->id])
            ->set('categoryScores', [
                'overall' => 4,
                'course_material' => 3,
                'interactivity' => 5,
                'technology' => 4,
            ])
            ->set('reviewText', 'Great course!')
            ->call('submitRating');

        $this->assertDatabaseHas('course_ratings', [
            'course_id' => $course->id,
            'user_id' => $user->id,
            'rating' => 4,
            'review' => 'Great course!',
        ]);
    }

    public function test_remove_rating_deletes_review()
    {
        $user = User::factory()->create();
        $course = CourseModel::factory()->create();
        $rating = CourseRating::factory()->create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);

        $this->actingAs($user);

        Livewire::test(\App\Livewire\Pages\Course::class, ['courseId' => $course->id])
            ->call('removeRating');

        $this->assertDatabaseMissing('course_ratings', [
            'id' => $rating->id,
        ]);
    }

}

