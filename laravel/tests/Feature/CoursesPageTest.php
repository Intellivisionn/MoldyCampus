<?php

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Course;

class CoursesPageTest extends TestCase
{
    public function test_initial_page_load()
    {

        Livewire::test(\App\Livewire\Pages\Courses::class)
            ->assertSet('currentPage', 1)
            ->assertSet('itemsPerPage', 12)
            ->assertViewHas('courses', function ($courses) {
                return $courses->count() === 12; // Ensure pagination works
            });
    }

    public function test_next_page_increments_current_page()
    {

        Livewire::test(\App\Livewire\Pages\Courses::class)
            ->call('nextPage')
            ->assertSet('currentPage', 2);
    }

    public function test_next_page_does_not_exceed_last_page()
    {
    
        Livewire::test(\App\Livewire\Pages\Courses::class)
            ->set('currentPage', 2)
            ->call('nextPage')
            ->assertSet('currentPage', 2); // Should not increment beyond last page
    }

    public function test_previous_page_decrements_current_page()
    {
        Livewire::test(\App\Livewire\Pages\Courses::class)
            ->set('currentPage', 2)
            ->call('previousPage')
            ->assertSet('currentPage', 1);
    }

    public function test_previous_page_does_not_go_below_one()
    {
        Livewire::test(\App\Livewire\Pages\Courses::class)
            ->call('previousPage')
            ->assertSet('currentPage', 1); // Should not decrement below 1
    }

    public function test_render_view_contains_correct_data()
    {

        Livewire::test(\App\Livewire\Pages\Courses::class)
            ->assertViewHas('courses', function ($courses) {
                return $courses->count() <= 12; // Ensure itemsPerPage is respected
            })
            ->assertViewHas('defaultImage', asset('images/courses/no-image.jpg'));
    }

    // public function test_empty_state()
    // {
    //     // No courses in the database
    //     Livewire::test(\App\Livewire\Pages\Courses::class)
    //         ->assertViewHas('courses', function ($courses) {
    //             return $courses->isEmpty(); // Verify empty state
    //         });
    // }
}
