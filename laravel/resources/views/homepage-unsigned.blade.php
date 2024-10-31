<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Portal</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="container">
            <a href="#" class="logo">MoldyCampus</a>
            <nav>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Professors</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="#" class="sign-up">Sign Up</a>
                <a href="#" class="login">Login</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-image">
            <img src="campus-image.jpg" alt="Campus Image">
        </div>
        <div class="trending-categories">
            <button>Trending Now</button>
            <button>Newly Added</button>
            <button>Top Rated</button>
            <button>Most Popular</button>
            <button>Recently Reviewed</button>
        </div>
    </section>

    <!-- Featured Courses -->
    <section class="featured-courses container">
        <h2>Featured Courses</h2>
        <div class="courses">
            <div class="course">
                <img src="economics.jpg" alt="Economics">
                <h3>Economics</h3>
                <p>ECON 201: Microeconomics</p>
                <button>View All Electives</button>
            </div>
            <div class="course">
                <img src="biology.jpg" alt="Biology">
                <h3>Biology</h3>
                <p>BIOL 304: Molecular Biology</p>
                <button>View All Electives</button>
            </div>
            <div class="course">
                <img src="cs.jpg" alt="Computer Science">
                <h3>Computer Science</h3>
                <p>CSCI 101: Intro to Programming</p>
                <button>View All Electives</button>
            </div>
            <div class="course">
                <img src="philosophy.jpg" alt="Philosophy">
                <h3>Philosophy</h3>
                <p>PHIL 410: Ethics & Morality</p>
                <button>View All Electives</button>
            </div>
        </div>
    </section>

    <!-- Professors Section -->
    <section class="professors container">
        <div class="professor">
            <img src="professor1.jpg" alt="Dr. Emily Stone">
            <p>Dr. Emily Stone<br><span>Literature</span></p>
        </div>
        <div class="professor">
            <img src="professor2.jpg" alt="Prof. John Carter">
            <p>Prof. John Carter<br><span>Physics</span></p>
        </div>
        <div class="professor">
            <img src="professor3.jpg" alt="Dr. Lisa Ray">
            <p>Dr. Lisa Ray<br><span>Sociology</span></p>
        </div>
        <div class="professor">
            <img src="professor4.jpg" alt="Prof. Mark Evans">
            <p>Prof. Mark Evans<br><span>Computer Science</span></p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer container">
        <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <div class="social-media">
            <a href="#">Twitter</a>
            <a href="#">Facebook</a>
            <a href="#">LinkedIn</a>
        </div>
        <p>© 2023 University Portal</p>
    </footer>
</body>
</html>
