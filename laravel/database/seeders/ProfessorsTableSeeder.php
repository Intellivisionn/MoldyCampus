<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Seeder;

class ProfessorsTableSeeder extends Seeder
{
    public function run()
    {
        Professor::factory()->count(10)->create();
    }
}
