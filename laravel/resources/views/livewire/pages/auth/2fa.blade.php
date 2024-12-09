<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;

    public string $two_factor_code = '';
    
    public function verify(): void
    {
        $validated = $this->validate([
            'two_factor_code' => ['required', 'digits:6', 'numeric'],
        ]);

        $user = User::where('two_factor_code', $this->two_factor_code)
                    ->where('two_factor_expires_at', '>', now())
                    ->first();

        if ($user) {
            // Clear the 2FA code and log the user in
            $user->update([
                'two_factor_code' => null,
                'two_factor_expires_at' => null,
            ]);

            Auth::login($user);
            Session::regenerate();


            $this->redirect(route('homepage', absolute: false), navigate: true);
        }
        else
        {
            throw ValidationException::withMessages([
                'two_factor_code' => __('The provided code is invalid or has expired.'),
            ]);
        }
    }
};
?>
<div class="flex flex-col items-center mb-4 mt-2 sm:justify-center sm:pt-0">
    <div class="w-full px-6 py-4 mt-2 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
        <h1 class="text-lg font-semibold text-center mb-4">Two-Factor Authentication</h1>

        @if (session('message'))
            <p class="text-green-600 text-sm mb-4">{{ session('message') }}</p>
        @endif

        <form wire:submit="verify">
            
            <!-- Authentication Code -->
            <div>
                <x-input-label for="code" :value="__('Authentication Code')" />
                <x-text-input wire:model="two_factor_code" id="code" class="block mt-1 w-full" type="text" 
                              name="code" required autofocus />
                <x-input-error :messages="$errors->get('two_factor_code')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Verify Code') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

