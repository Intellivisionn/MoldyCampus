<?php
 
namespace Tests\Feature;
 
use App\Models\User;
use Tests\TestCase;
 
class ExampleTest extends TestCase
{
    public function test_an_action_that_requires_authentication(): void
    {
        $user = User::factory()->create();
 
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/');
 
        //
    }
}