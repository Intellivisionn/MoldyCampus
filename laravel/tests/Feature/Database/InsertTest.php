<?php
namespace Tests\Feature\Database;

use App\Models\User;
use Tests\TestCase;

class InsertTest extends TestCase
{
    public function test_user_data_insert_to_db()
    {   
        // Create a user using the factory
        User::create(
            [
                'name' => 'User Inserted',
                'email' => 'userinserted@example.com',
                'major' => '1',
                'password' => 'password',
            ]
        );

        $this->assertDatabaseHas('users', ['email' => 'userinserted@example.com']);
    }
}
