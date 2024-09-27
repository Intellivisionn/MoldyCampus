<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoldyCampus </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <nav>
            <div class="logo">MoldyCampus</div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Top Classes</a></li>
                <li><a href="#">Top Professors</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="#">Log in / Sign up</a>
                <input type="search" placeholder="Search">
            </div>
        </nav>
    </header>

    <main>

        <div class="content">
            
          
    
            <div class="carousel">
                <div class="images">
                <img class="slide displaySlide" src="{{ asset('images/SDUimage.jpg') }}">
                <img class="slide" src="{{ asset('images/SDUSonderborg.jpg') }}">
                <img class="slide" src="{{ asset('images/SDU.jpg') }}">
</div>

                
                <button class="prev" onclick="prevSlide()">&#10094</button>
                <button class="next" onclick="nextSlide()">&#10095</button>   
                                   
            </div>
            
            <div class="notation">
                <h1>Explore the Moldiest</h1>
                <p>Browse the highest-rated classes and professors</p>
                <button>Start Exploring Now</button>
            </div>
        
        </div>

        

        <section class="featured-courses">
            <h2>Featured Courses This Semester Just For You</h2>
            <div class="courses-grid">
                <a href="#" class="course">Math 1</a>
                <a href="#" class="course">Data Management</a>
                <a href="#" class="course">Computer Systems</a>        
                <a href="#" class="course">OOP</a>
            </div>
        </section>

        <section class="top-professors">
            <h2>Top Professors by Ranking</h2>
            <div class="professor-grid">
                <a href="#" class="professor">1. Bjarne Schmidt</a>
                <a href="#" class="professor">2. Mubashrah Saddiqa</a>
                <a href="#" class="professor">3. Maximus Kaos</a>
                <a href="#" class="professor">4. Sadok Ben Yahia</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 MoldyCampus. All rights reserved.</p>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>