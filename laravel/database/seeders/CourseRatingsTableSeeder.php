<?php

namespace Database\Seeders;

use App\Models\CourseRating;
use Illuminate\Database\Seeder;

class CourseRatingsTableSeeder extends Seeder
{
    public function run()
    {
        CourseRating::factory()->count(10)->create();
    }
}
