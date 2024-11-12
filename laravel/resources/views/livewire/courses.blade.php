<div>
    <!-- Category Buttons -->
    <div class="mt-3 d-flex justify-content-center">
        <button wire:click="setCategory('trending')" class="btn btn-outline-secondary me-2">Trending Now</button>
        <button wire:click="setCategory('newly_added')" class="btn btn-outline-secondary me-2">Newly Added</button>
        <button wire:click="setCategory('top_rated')" class="btn btn-outline-secondary me-2">Top Rated</button>
        <button wire:click="setCategory('most_popular')" class="btn btn-outline-secondary me-2">Most Popular</button>
        <button wire:click="setCategory('recently_reviewed')" class="btn btn-outline-secondary">Recently
            Reviewed</button>
    </div>

    <!-- Courses Sections -->
    <div class="mt-4 position-relative">
        <h2 class="mb-4 text-center">{{ $categories[$category] }}</h2>
        <div class="d-flex justify-content-center">
            <!-- Pagination Previous Button -->
            @if ($currentPage > 1)
                <button wire:click="previousPage"
                    class="btn btn-link position-absolute start-0 top-50 translate-middle-y"
                    style="font-size: 2rem; color: black;">&lt;</button>
            @endif

            <!-- Course Container -->
            <div class="flex-wrap course-container d-flex justify-content-center" style="width: 80%;">
                @foreach ($courses->forPage($currentPage, $itemsPerPage) as $course)
                    <div class="mx-2 mb-3 text-center course-card">
                        <div class="border-0 shadow-sm card h-100">
                            <img src="{{ file_exists(public_path('images/courses/' . $course->image_path)) ? asset('images/courses/' . $course->image_path) : asset('images/courses/no-image.jpg') }}"
                                class="course-card-img card-img-top img-fluid" alt="{{ $course->title }}"
                                style="object-fit: cover; height: 200px;">
                            <div class="text-center card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title text-truncate" style="max-width: 30ch;">{{ $course->name }}
                                </h5>
                                <p class="card-text">{{ Str::limit($course->description, 50) }}</p>
                                <a href="#" class="btn btn-outline-secondary rounded-pill">More Information</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Next Button -->
            @if ($currentPage < ceil($courses->count() / $itemsPerPage))
                <button wire:click="nextPage" class="btn btn-link position-absolute end-0 top-50 translate-middle-y"
                    style="font-size: 2rem; color: black;">&gt;</button>
            @endif
        </div>
    </div>
</div>
