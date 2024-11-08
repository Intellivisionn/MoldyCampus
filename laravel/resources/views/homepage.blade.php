<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MoldyCampus - Discover The Taste of the University Mould</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @livewireStyles
    </head>

    <body>

        <!-- hero section -->
        @include('partials.homepage.hero')

        <!-- Featured Courses loaded -->
        @include('partials.homepage.courses')

        <!-- Professors Section -->
        @include('partials.homepage.professors')

        @livewireScripts
    </body>

    </html>
</x-app-layout>
