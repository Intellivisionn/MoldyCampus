<?php

use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{   

    public function test_user_registration()
    {
        // Seed the majors table with a valid major
        \DB::table('majors')->insert([
            'id' => 1, // Make sure this matches the `major` foreign key in the users table
            'major_name' => 'Computer Science', // Adjust the name as needed
        ]);

        // Attempt to create a user
        $response = $this->post('/register', [
            'name' => 'User REGISTERED',
            'email' => 'userregistered@example.com',
            'major' => 1, // Ensure this matches the seeded major ID
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => 'userregistered@example.com',
        ]);
    }
}
