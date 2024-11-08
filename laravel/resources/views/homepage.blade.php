<x-app-layout>

        <!-- hero section -->
        @include('partials.homepage.hero')

        <!-- Featured Courses loaded -->
        @include('partials.homepage.courses')

        <!-- Professors Section -->
        @include('partials.homepage.professors')

        @livewireScripts
        
</x-app-layout>
