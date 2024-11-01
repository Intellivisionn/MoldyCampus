<div>
    <!-- Category Buttons -->
    <div class="d-flex justify-content-center mt-3">
        <button wire:click="setCategory('trending')" class="btn btn-outline-secondary me-2">Trending Now</button>
        <button wire:click="setCategory('newly_added')" class="btn btn-outline-secondary me-2">Newly Added</button>
        <button wire:click="setCategory('top_rated')" class="btn btn-outline-secondary me-2">Top Rated</button>
        <button wire:click="setCategory('most_popular')" class="btn btn-outline-secondary me-2">Most Popular</button>
        <button wire:click="setCategory('recently_reviewed')" class="btn btn-outline-secondary">Recently Reviewed</button>
    </div>

    <!-- Courses Section -->
    <div class="mt-4">
        <h2 class="text-center mb-4">{{ $categories[$category] }}</h2>
        <div class="d-flex justify-content-center">
            <!-- Pagination Previous Button -->
            @if($currentPage > 1)
                <button wire:click="previousPage" class="btn btn-secondary me-2">&lt;</button>
            @endif

            <!-- Course Container -->
            <div class="course-container d-flex flex-wrap justify-content-center" style="width: 80%;">
                @foreach($courses->forPage($currentPage, $itemsPerPage) as $course)
                    <div class="course-card text-center mx-2 mb-3">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('images/' . $course['image']) }}" class="card-img-top img-fluid" alt="{{ $course['title'] }}" style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column justify-content-between text-center">
                                <h5 class="card-title text-truncate" style="max-width: 30ch;">{{ $course['title'] }}</h5>
                                <p class="card-text">{{ $course['code'] }}</p>
                                <a href="#" class="btn btn-outline-secondary rounded-pill">View All Electives</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Next Button -->
            @if($currentPage < ceil($courses->count() / $itemsPerPage))
                <button wire:click="nextPage" class="btn btn-secondary ms-2">&gt;</button>
            @endif
        </div>
    </div>
</div>
