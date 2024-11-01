<section class="hero mt-4">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/homepage/campus.jpg') }}" class="d-block img-fluid rounded hero-image" alt="Campus Image">
            </div>
            <!-- Add more carousel items here if needed -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <!-- Add more indicators here if you have more carousel items -->
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <button class="btn btn-outline-secondary me-2">Trending Now</button>
        <button class="btn btn-outline-secondary me-2">Newly Added</button>
        <button class="btn btn-outline-secondary me-2">Top Rated</button>
        <button class="btn btn-outline-secondary me-2">Most Popular</button>
        <button class="btn btn-outline-secondary">Recently Reviewed</button>
    </div>
</section>
