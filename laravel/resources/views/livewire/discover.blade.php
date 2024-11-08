<div>
    <!-- Category Buttons -->
    <div class="mt-3 d-flex justify-content-center">
    <button wire:click="setCategory('trending')" class="btn btn-outline-secondary me-2">Trending Now</button>
        <button wire:click="setCategory('newly_added')" class="btn btn-outline-secondary me-2">Newly Added</button>
        <button wire:click="setCategory('top_rated')" class="btn btn-outline-secondary me-2">Top Rated</button>
        <button wire:click="setCategory('most_popular')" class="btn btn-outline-secondary me-2">Most Popular</button>
        <button wire:click="setCategory('recently_reviewed')" class="btn btn-outline-secondary">Recently Reviewed</button>
        <!-- Your buttons here -->
    </div>

    <!-- Courses Section -->
    <div class="mt-4">
        <h2 class="mb-4 text-center">{{ $categories[$category] }}</h2>
        <div class="container">
            <div class="row justify-content-center gx-4 gy-4">
                @foreach ($courses->take(12) as $course)
                    <div class="col-md-3">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('images/courses/' . $course['image']) }}"
                                 class="card-img-top img-fluid" alt="{{ $course['title'] }}"
                                 style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">{{ $course['title'] }}</h5>
                                <p class="card-text">{{ $course['code'] }}</p>
                                <a href="#" class="btn btn-outline-secondary rounded-pill mt-auto">View All Electives</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
