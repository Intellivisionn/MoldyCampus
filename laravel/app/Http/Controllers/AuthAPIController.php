<?php

namespace App\Http\Controllers;

use App\Models\User; // User model
use Illuminate\Auth\Events\PasswordReset; // PasswordReset event
use Illuminate\Auth\Events\Registered; // Registered event
use Illuminate\Http\Request; // Request class
use Illuminate\Support\Facades\Auth; // Auth facade
use Illuminate\Support\Facades\Hash; // Hash facade
use Illuminate\Support\Facades\Password; // Password facade
use Illuminate\Support\Facades\RateLimiter; // RateLimiter facade
use Illuminate\Support\Facades\Session; // Session facade
use Illuminate\Support\Str; // Str class
use Illuminate\Validation\ValidationException; // ValidationException class

// A facade is a class that provides access to an object from the container.
// It is basically a static proxy to underlying classes in the service container,
// providing the benefit of a terse, expressive syntax while maintaining more
// testability and flexibility than traditional static methods.

class AuthAPIController
{
    // Login method
    public function login(Request $request)
    {
        // Log the attempt to log in
        error_log('Attempting to log in user: '.$request->input('email'));

        try {
            // Validate the request
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            // Log after validation
            error_log('Validation passed for user: '.$request->input('email'));

            // Generate a throttle key for rate limiting
            $throttleKey = Str::transliterate(Str::lower($request->input('email')).'|'.$request->ip());

            // Check if the user has too many login attempts
            if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
                event(new Lockout($request));

                $seconds = RateLimiter::availableIn($throttleKey);

                throw ValidationException::withMessages([
                    'email' => trans('auth.throttle', [
                        'seconds' => $seconds,
                        'minutes' => ceil($seconds / 60),
                    ]),
                ]);
            }

            // Attempt to authenticate the user
            if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
                RateLimiter::hit($throttleKey);

                throw ValidationException::withMessages([
                    'email' => [trans('auth.failed')],
                ]);
            }

            // Clear the rate limiter
            RateLimiter::clear($throttleKey);

            // Regenerate the session ID to prevent session fixation attacks
            Session::regenerate();

            // Issue a token to the authenticated user
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            // Log successful login
            error_log('User logged in successfully: '.$request->input('email'));

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error logging in user: '.$request->input('email').' - '.$e->getMessage());

            return response()->json(['error' => 'Login failed', 'message' => $e->getMessage()], 500);
        }
    }

    // Register method
    public function register(Request $request)
    {
        // Log the attempt to register a new user
        error_log('Attempting to register a new user with email: '.$request->input('email'));

        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users|ends_with:@student.sdu.dk',
                'password' => 'required|string|min:8|confirmed',
                'major' => 'required|exists:majors,id',
                'profile_picture' => 'nullable|image|max:1024', // max:1024 for max 1MB file size
            ]);

            // Prepare the data for creating a new user
            $data = $request->only('name', 'email', 'password', 'major');
            $data['password'] = Hash::make($data['password']);

            // Handle profile picture upload if provided
            if ($request->hasFile('profile_picture')) {
                $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public'); // store in storage/app/public/profile_pictures
            }

            // Create the new user
            $user = User::create($data);

            // Trigger the Registered event
            event(new Registered($user));

            // Log in the newly registered user
            Auth::login($user);

            // Issue a token to the newly registered user
            $token = $user->createToken('API Token')->plainTextToken;

            // Log the successful registration
            error_log('User registered successfully with email: '.$request->input('email'));

            return response()->json([
                'message' => 'Registration successful',
                'user' => $user,
                'token' => $token,
            ], 201);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error registering user with email: '.$request->input('email').' - '.$e->getMessage());

            return response()->json(['error' => 'Failed to register user', 'message' => $e->getMessage()], 500);
        }
    }

    // Forgot password method
    public function forgotPassword(Request $request)
    {
        // Log the attempt to send a password reset link
        error_log('Attempting to send password reset link to email: '.$request->input('email'));

        try {
            // Validate the request
            $request->validate(['email' => 'required|email']);

            // Send the password reset link
            $status = Password::sendResetLink( // When this function exists, it will send a password reset link
                $request->only('email')
            );

            // Log the result of the password reset link attempt
            if ($status === Password::RESET_LINK_SENT) {
                error_log('Password reset link sent successfully to email: '.$request->input('email'));

                return response()->json(['message' => __($status)]);
            } else {
                error_log('Failed to send password reset link to email: '.$request->input('email'));

                return response()->json(['email' => __($status)], 422);
            }
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error sending password reset link to email: '.$request->input('email').' - '.$e->getMessage());

            return response()->json(['error' => 'Failed to send password reset link', 'message' => $e->getMessage()], 500);
        }
    }

    // Reset password method
    public function resetPassword(Request $request)
    {
        // Log the attempt to reset the password
        error_log('Attempting to reset password for email: '.$request->input('email'));

        try {
            // Validate the request
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Reset the user's password
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user) use ($request) {
                    $user->forceFill([
                        'password' => Hash::make($request->password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    // Trigger the PasswordReset event
                    event(new PasswordReset($user));
                }
            );

            // Log the result of the password reset attempt
            if ($status === Password::PASSWORD_RESET) {
                error_log('Password reset successfully for email: '.$request->input('email'));

                return response()->json(['message' => __($status)]);
            } else {
                error_log('Failed to reset password for email: '.$request->input('email'));

                return response()->json(['email' => __($status)], 422);
            }
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error resetting password for email: '.$request->input('email').' - '.$e->getMessage());

            return response()->json(['error' => 'Failed to reset password', 'message' => $e->getMessage()], 500);
        }
    }

    // Logout method
    public function logout(Request $request)
    {
        // Log the attempt to log out the user
        error_log('Attempting to log out user with ID: '.Auth::id());

        try {
            // Log out the user
            Auth::guard('web')->logout();

            // Invalidate the session
            $request->session()->invalidate();

            // Regenerate the session token
            $request->session()->regenerateToken();

            // Log the successful logout
            error_log('User logged out successfully with ID: '.Auth::id());

            return response()->json(['message' => 'Logout successful']);
        } catch (\Exception $e) {
            // Log any exceptions
            error_log('Error logging out user with ID: '.Auth::id().' - '.$e->getMessage());

            return response()->json(['error' => 'Failed to log out', 'message' => $e->getMessage()], 500);
        }
    }
}
