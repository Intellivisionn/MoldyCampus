<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section class="p-6 rounded-lg shadow-md bg-gray-50">
    <header>
        <h2 class="text-lg font-medium text-black">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-black">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-black" />
            <x-text-input wire:model="current_password" id="update_password_current_password" name="current_password"
                type="password" class="block w-full mt-1 text-black bg-white hover:bg-gray-100"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2 text-black" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-black" />
            <x-text-input wire:model="password" id="update_password_password" name="password" type="password"
                class="block w-full mt-1 text-black bg-white hover:bg-gray-100" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-black" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-black" />
            <x-text-input wire:model="password_confirmation" id="update_password_password_confirmation"
                name="password_confirmation" type="password"
                class="block w-full mt-1 text-black bg-white hover:bg-gray-100" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-black" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="text-black bg-white hover:bg-gray-100">{{ __('Save') }}</x-primary-button>

            <x-action-message class="text-black me-3" on="password-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
