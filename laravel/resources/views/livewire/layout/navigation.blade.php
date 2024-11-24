<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <header class="navbar navbar-expand-lg navbar-light bg-light" style="z-index: 1000; position: relative;">
        <div class="container">
            <a href="{{ '/' }}" class="navbar-brand">MoldyCampus</a>
            <div class="navbar-collapse" id="navbarNav">
                <ul class="mb-2 navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('professors') }}">Professors</a>
                    </li>
                </ul>
                @include('livewire.search')
                @if (auth()->check())
                    <!-- Settings Dropdown -->
                    <div class="d-flex align-items-center ms-3">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="btn btn-outline-secondary d-flex align-items-center">
                                <img src="{{ auth()->user()->profile_picture ? ('/storage/' . auth()->user()->profile_picture) : ('/storage/profile_pictures/default.png')}}" 
                                    alt="Profile Picture" 
                                    class="rounded-circle" 
                                    style="width: 30px; height: 30px; object-fit: cover; margin-right: 10px;">
    
                                    <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                        x-on:profile-updated.window="name = $event.detail.name"></div>
                                </button>
                            </x-slot>
    
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Profile') }}
                                </x-dropdown-link>
    
                                <!-- Authentication -->
                                <button wire:click="logout" class="w-100 text-start">
                                    <x-dropdown-link>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </button>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="d-flex">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </header>    
</nav>
