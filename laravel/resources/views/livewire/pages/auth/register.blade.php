<?php

use App\Models\User;
use App\Models\Major;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts.guest')] class extends Component {
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $major = '';
    public $profile_picture;
    public $majors = []; // Property to hold majors

    public function mount()
{
    $this->majors = Major::all();
}

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class, 'ends_with:@student.sdu.dk'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'major' => ['required', 'exists:majors,id'],
            'profile_picture' => ['nullable', 'image', 'max:1024'], // max:1024 for max 1MB file size
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($this->profile_picture) {
            $validated['profile_picture'] = $this->profile_picture->store('profile_pictures', 'public');
        }

        $user = User::create($validated);

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
};
?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Major -->
        <!-- Major -->
        <div class="mt-4">
            <x-input-label for="major" :value="__('Major')" />
            <select wire:model="major" id="major" class="block mt-1 w-full" name="major" required>
                <option value="">{{ __('Select your major') }}</option>
                @foreach ($majors as $majorOption)
                    <option value="{{ $majorOption->id }}">{{ $majorOption->major_name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('major')" class="mt-2" />
        </div>

        <!-- Profile Picture -->
        <div class="mt-4">
            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
            <input wire:model="profile_picture" id="profile_picture" class="block mt-1 w-full" type="file"
                name="profile_picture" accept="image/*" />
            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
