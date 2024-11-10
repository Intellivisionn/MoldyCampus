<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Create 50 courses
        Course::factory()->count(10)->create();
    }
}
