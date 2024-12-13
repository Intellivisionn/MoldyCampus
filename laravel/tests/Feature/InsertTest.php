<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Str; // Import for generating unique values
use Tests\TestCase;

class InsertTest extends TestCase
{
    public function test_user_data_insert_to_db()
    {   
        // Dynamically generate a unique email address for each test run
        $uniqueEmail = 'user_' . Str::random(8) . '@example.com';

        // Create a user with the unique email
        User::create([
            'name' => 'User Inserted',
            'email' => $uniqueEmail,
            'major' => '1',
            'password' => bcrypt('password'), // Hash the password to meet security standards
        ]);

        // Assert that the user is present in the database
        $this->assertDatabaseHas('users', ['email' => $uniqueEmail]);
    }
}
