<?php

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Professor;

class ProfessorsPageTest extends TestCase
{
    public function test_initial_page_load()
    {
        Livewire::test(\App\Livewire\Pages\Professors::class)
            ->assertSet('currentPage', 1)
            ->assertSet('itemsPerPage', 8);
    }

    public function test_next_page_increments_correctly()
    {
        // Ensure there are enough professors in the database for multiple pages
        $professorCount = Professor::count();
        $itemsPerPage = 8;
        $lastPage = ceil($professorCount / $itemsPerPage);

        if ($lastPage > 1) {
            Livewire::test(\App\Livewire\Pages\Professors::class)
                ->call('nextPage')
                ->assertSet('currentPage', 2);
        } else {
            $this->markTestSkipped('Not enough professors for multiple pages.');
        }
    }

    public function test_next_page_does_not_increment_past_last_page()
    {
        $professorCount = Professor::count();
        $itemsPerPage = 8;
        $lastPage = ceil($professorCount / $itemsPerPage);

        Livewire::test(\App\Livewire\Pages\Professors::class)
            ->set('currentPage', $lastPage)
            ->call('nextPage')
            ->assertSet('currentPage', $lastPage);
    }

    public function test_previous_page_decrements_correctly()
    {
        Livewire::test(\App\Livewire\Pages\Professors::class)
            ->set('currentPage', 2)
            ->call('previousPage')
            ->assertSet('currentPage', 1);
    }

    public function test_previous_page_does_not_decrement_below_1()
    {
        Livewire::test(\App\Livewire\Pages\Professors::class)
            ->call('previousPage')
            ->assertSet('currentPage', 1);
    }

    public function test_render_method_provides_correct_data()
    {
        Livewire::test(\App\Livewire\Pages\Professors::class)
            ->assertViewHas('professors', function ($professors) {
                return count($professors) <= 8; // Should return at most 8 professors
            })
            ->assertViewHas('defaultImage', asset('images/professors/no-image.jpg'));
    }

    public function test_get_professors_orders_correctly()
    {
        $professors = Professor::orderBy('name', 'asc')->limit(8)->get();

        Livewire::test(\App\Livewire\Pages\Professors::class)
            ->assertViewHas('professors', function ($data) use ($professors) {
                return $data[0]['name'] === $professors[0]->name &&
                       $data[1]['name'] === $professors[1]->name;
            });
    }

    public function test_empty_database()
    {
        // Only run this test if there are no professors in the database
        if (Professor::count() === 0) {
            Livewire::test(\App\Livewire\Pages\Professors::class)
                ->assertViewHas('professors', []);
        } else {
            $this->markTestSkipped('Database is not empty.');
        }
    }

    public function test_small_dataset()
    {
        $professorCount = Professor::count();
        $itemsPerPage = 8;

        if ($professorCount > 0 && $professorCount < $itemsPerPage) {
            Livewire::test(\App\Livewire\Pages\Professors::class)
                ->assertViewHas('professors', function ($data) use ($professorCount) {
                    return count($data) === $professorCount;
                });
        } else {
            $this->markTestSkipped('Dataset does not match small dataset criteria.');
        }
    }
}
