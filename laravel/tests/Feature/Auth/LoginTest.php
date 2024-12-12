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

}
