<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        Course::factory()->count(10)->create();
    }
}
