<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MouldyCampus') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div>
        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="px-4 py-6 mx-auto text-black max-w-7xl sm:px-6 lg:px-8 hover:text-gray-500">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <footer class="footer pt-4 pb-2">
        <!-- Centered Wrapper -->
        <div class="container text-center">
            <!-- Links -->
            <div class="footer-links mb-3">
                <a href="{{ route('privacy-policy') }}" class="footer-link mx-3">Privacy Policy</a>
                <a href="{{ route('tos') }}" class="footer-link mx-3">Terms of Service</a>
                <a href="{{ route('contact_us') }}" class="footer-link mx-3">Contact Us</a>
            </div>
    
            <!-- Social Media Icons -->
            <div class="social-media mb-3">
                <a href="#" class="social-icon mx-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon mx-2"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-icon mx-2"><i class="fab fa-linkedin"></i></a>
            </div>
    
        <p class="footer-text mb-0">&copy; {{ date('Y') }} MoldyCampus</p>
    </footer>
    
    <!-- Font Awesome CDN for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
