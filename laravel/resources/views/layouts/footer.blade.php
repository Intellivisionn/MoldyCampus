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
