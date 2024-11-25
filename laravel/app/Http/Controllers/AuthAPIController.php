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

class AuthAPIController extends Controller
{
    // Login method
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember' => 'boolean',
        ]);

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

        return response()->json([
            'message' => 'Login successful',
            'user' => Auth::user(),
        ]);
    }

    // Register method
    public function register(Request $request)
    {
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
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public'); // store in storage/app/public/profile_pictures, im not sure if this is the correct path and will work, needs testing
        }

        // Create the new user
        $user = User::create($data);

        // Trigger the Registered event
        event(new Registered($user));

        // Log in the newly registered user
        Auth::login($user);

        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
        ], 201);
    }

    // Forgot password method
    public function forgotPassword(Request $request)
    {
        // Validate the request
        $request->validate(['email' => 'required|email']);

        // Send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? response()->json(['message' => __($status)])
                    : response()->json(['email' => __($status)], 422);
    }

    // Reset password method
    public function resetPassword(Request $request)
    {
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

        return $status === Password::PASSWORD_RESET
                    ? response()->json(['message' => __($status)])
                    : response()->json(['email' => __($status)], 422);
    }

    // Logout method
    public function logout(Request $request)
    {
        // Log out the user
        Auth::guard('web')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout successful']);
    }
}
