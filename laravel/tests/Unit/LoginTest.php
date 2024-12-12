<?php

namespace Tests\Unit;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\LoginForm;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginTest extends TestCase
{
    public function test_login_component_renders_properly()
    {
        $this->get('/login') // Assuming the login component is on this route.
            ->assertStatus(200)
            ->assertSee('Log in') // Check for the button or a specific text.
            ->assertSee('Email');
    }

    public function test_login_validation_fails_on_invalid_input()
    {
        Livewire::test(LoginForm::class)
            ->set('form.email', 'invalid-email')
            ->set('form.password', '')
            ->call('login')
            ->assertHasErrors([
                'form.email' => 'email',
                'form.password' => 'required',
            ]);
    }

    public function test_login_successfully_authenticates_user()
    {
        $user = User::factory()->create([
            'email' => 'test1@example.com',
            'password' => bcrypt('password123'),
        ]);

        Livewire::test(LoginForm::class)
            ->set('form.email', 'test1@example.com')
            ->set('form.password', 'password123')
            ->call('login')
            ->assertRedirect(route('homepage')); // Assuming 'homepage' is the intended route.
        
        $this->assertAuthenticatedAs($user);
    }

    public function test_session_is_regenerated_on_login()
    {
        Session::shouldReceive('regenerate')->once();

        $user = User::factory()->create([
            'email' => 'test2@example.com',
            'password' => bcrypt('password123'),
        ]);

        Livewire::test(LoginForm::class)
            ->set('form.email', 'test2@example.com')
            ->set('form.password', 'password123')
            ->call('login');
    }

    public function test_redirect_intended_functionality()
    {
        $user = User::factory()->create();

        Livewire::test(LoginForm::class)
            ->set('form.email', $user->email)
            ->set('form.password', 'password123')
            ->call('login')
            ->assertRedirect(route('homepage')); // Default redirect.
    }

    private function creatUser() : User
    {
        return User::factory()->create();
    }
}
