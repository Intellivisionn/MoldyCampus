<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseRating;
use App\Models\Professor;
use App\Models\User;
use App\Models\Major;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Major::factory(10)->create();
        User::factory(10)->create();
        Course::factory(10)->create();
        Professor::factory(10)->create();
        CourseRating::factory(10)->create();
    }
}
