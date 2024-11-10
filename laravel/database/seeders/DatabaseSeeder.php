<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create(); //okay to generate

        /*User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // Ensure you hash the password
                'remember_token' => Str::random(10),
            ]
        );*/
        $this->call([
            CoursesTableSeeder::class, //okay to generate
            ProfessorsTableSeeder::class, //okay to generate
            //CourseRatingsTableSeeder::class, //this will work only with hard coded values of user ID and course ID
        ]);
    }
}
