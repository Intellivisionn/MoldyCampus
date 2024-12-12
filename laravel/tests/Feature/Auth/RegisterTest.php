<?php

use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{   

    public function test_user_can_register()
    {   
        // Create a user using the factory
        User::create(
            [
                'name' => 'User REGISTERED',
                'email' => 'userregistered@example.com',
                'major' => '1',
                'password' => 'password',
            ]
        );

        $this->assertDatabaseHas('users', ['email' => 'userregistered@example.com']);
    }
}
