<?php

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Event;
use Livewire\Livewire;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;

// class LoginFormTest extends TestCase
// {
//     public function test_successful_authentication()
//     {
//         $user = User::factory()->create(['password' => bcrypt('password')]);

//         Livewire::test(\App\Livewire\Forms\LoginForm::class)
//             ->set('email', $user->email)
//             ->set('password', 'password')
//             ->call('authenticate');

//         $this->assertTrue(Auth::check());
//     }

//     public function test_failed_authentication()
//     {
//         Livewire::test(\App\Livewire\Forms\LoginForm::class)
//             ->set('email', 'invalid@example.com')
//             ->set('password', 'wrongpassword')
//             ->call('authenticate')
//             ->assertSessionHasErrors(['form.email' => trans('auth.failed')]);
//     }

//     public function test_rate_limiting_lockout()
//     {
//         Event::fake();
//         RateLimiter::shouldReceive('tooManyAttempts')->andReturn(true);
//         RateLimiter::shouldReceive('availableIn')->andReturn(60);

//         Livewire::test(\App\Livewire\Forms\LoginForm::class)
//             ->set('email', 'test@example.com')
//             ->set('password', 'wrongpassword')
//             ->call('authenticate')
//             ->assertSessionHasErrors(['form.email' => trans('auth.throttle', ['seconds' => 60, 'minutes' => 1])]);

//         Event::assertDispatched(Lockout::class);
//     }

//     public function test_throttle_key_generation()
//     {
//         $component = app(\App\Livewire\Forms\LoginForm::class);
//         $component->email = 'test@example.com';

//         $expectedKey = strtolower('test@example.com') . '|' . request()->ip();
//         $this->assertEquals($expectedKey, $component->throttleKey());
//     }
// }

