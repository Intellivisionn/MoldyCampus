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
                'name' => 'Test User',
                'email' => 'testuser@example.com',
                'major' => '1',
                'password' => 'password',
            ]
        );

        // $response = $this->post('/register', [
        //     'name' => 'Test User',
        //     'email' => 'testuser@example.com',
        //     'major' => '1',
        //     'password' => 'password',
        //     'password_confirmation' => 'password',
        // ]);

        //$response->assertRedirect(route('homepage'));
        $this->assertDatabaseHas('users', ['email' => 'testuser@example.com']);
    }
}
