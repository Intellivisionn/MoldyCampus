<?php

namespace tests\Feature;

use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_user_can_register()
    {   
        // Dynamically generate a unique email address for each test run
        $uniqueEmail = 'user_' . Str::random(8) . '@example.com';

        // Create a user with the unique email
        User::create([
            'name' => 'User REGISTERED',
            'email' => $uniqueEmail,
            'major' => '1',
            'password' => bcrypt('password'), // Hash the password
        ]);

        // Assert that the user is present in the database
        $this->assertDatabaseHas('users', ['email' => $uniqueEmail]);
    }
}

