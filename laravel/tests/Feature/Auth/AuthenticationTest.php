<?php

use App\Models\User;
use Livewire\Volt\Volt;
use Tests\TestCase;

// class AuthenticationTest extends TestCase
// {
//     public function test_login_screen_can_be_rendered()
//     {
//         $response = $this->get('/login');

//         $response->assertOk()
//                  ->assertSee('pages.auth.login');
//     }

//     public function test_users_can_authenticate_using_the_login_screen()
//     {
//         $user = User::factory()->create();

//         $component = Volt::test('pages.auth.login')
//             ->set('email', $user->email)
//             ->set('password', 'password')  // Ensure the correct password here
//             ->call('authenticate');  // Call the method for authentication

//         // Assert that there are no errors
//         $component->assertHasNoErrors();

//         // Assert the user is redirected to the homepage
//         $component->assertRedirect(route('homepage', false));

//         // Assert the user is authenticated
//         $this->assertAuthenticatedAs($user);
//     }

//     public function test_users_cannot_authenticate_with_invalid_password()
//     {
//         $user = User::factory()->create();

//         $component = Volt::test('pages.auth.login')
//             ->set('form.email', $user->email)
//             ->set('form.password', 'wrong-password');

//         $component->call('login');

//         $component
//             ->assertHasErrors()
//             ->assertNoRedirect();

//         $this->assertGuest();
//     }

//     // public function test_navigation_menu_can_be_rendered()
//     // {
//     //     $user = User::factory()->create();
//     //     $this->actingAs($user);
//     //
//     //     $response = $this->get('/dashboard');
//     //
//     //     $response
//     //         ->assertOk()
//     //         ->assertSee('layout.navigation');
//     // }

//     public function test_users_can_logout()
//     {
//         $user = User::factory()->create();

//         $this->actingAs($user);

//         $component = Volt::test('layout.navigation');

//         $component->call('logout');

//         $component
//             ->assertHasNoErrors()
//             ->assertRedirect('/');

//         $this->assertGuest();
//     }
// }
