<?php

namespace App\Livewire\Forms;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Forms;
use App\Mail\TwoFactorCodeMail;
use Illuminate\Support\Facades\Mail; 


class LoginForm extends Form
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            $user = Auth::user();
            $user->two_factor_code = rand(100000, 999999);
            $user->two_factor_expires_at = now()->addMinutes(10);
            $user->save();

            // Send the 2FA code to the user's email
            Mail::to($user->email)->send(new TwoFactorCodeMail($user->two_factor_code));
            
            session()->put('user_email', $user->email);
            // Log the user out temporarily
            Auth::logout();
            
            // Redirect the user to a page where they can enter the 2FA code
            if(session()->get('2fa_attempts') == -1)
            {
                session()->put('2fa_attempts',  2);
            }
            session()->flash('message', 'We sent you a 2FA code. Please check your email.');
            
        }else {
            RateLimiter::clear($this->throttleKey());
        
            throw ValidationException::withMessages([
                'form.email' => trans('auth.failed'),]);
        }        
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'form.email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}
