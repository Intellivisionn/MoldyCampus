<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseRating;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Course::factory(10)->create();
        Professor::factory(10)->create();
        CourseRating::factory(10)->create();
    }
}
