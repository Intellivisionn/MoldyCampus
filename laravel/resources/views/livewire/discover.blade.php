

<div>
    <!-- Category Buttons -->
    <div class="mt-3 d-flex justify-content-center">
        <button wire:click="setCategory('trending')" class="btn btn-category me-2 @if($category === 'trending') active @endif">Trending Now</button>
        <button wire:click="setCategory('newly_added')" class="btn btn-category me-2 @if($category === 'newly_added') active @endif">Newly Added</button>
        <button wire:click="setCategory('top_rated')" class="btn btn-category me-2 @if($category === 'top_rated') active @endif">Top Rated</button>
        <button wire:click="setCategory('most_popular')" class="btn btn-category me-2 @if($category === 'most_popular') active @endif">Most Popular</button>
        <button wire:click="setCategory('recently_reviewed')" class="btn btn-category @if($category === 'recently_reviewed') active @endif">Recently Reviewed</button>
    </div>

    <!-- Courses Section -->
    <div class="mt-4">
        <h2 class="mb-4 text-center">{{ $categories[$category] }}</h2>
        <div class="container">
            <div class="row justify-content-center gx-4 gy-4">
                @foreach ($courses as $course)
                    <div class="col-md-3">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ file_exists(public_path('images/courses/' . $course->image_path)) 
                            ? asset('images/courses/' . $course->image_path) 
                            : asset('images/courses/no-image.jpg') }}"
                                class="course-card-img card-img-top img-fluid" alt="{{ $course->title }}"
                                style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->code }}</p>
                                <a href="#" class="btn btn-outline-primary rounded-pill mt-auto">More Information</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Pagination Controls -->
    <div class="mt-4 d-flex justify-content-center">
        <button wire:click="previousPage" class="btn btn-pagination btn-outline-primary me-2" @if($courses->onFirstPage()) disabled @endif>Previous</button>
        <span class="mx-3 align-self-center">Page {{ $courses->currentPage() }} of {{ $courses->lastPage() }}</span>
        <button wire:click="nextPage" class="btn btn-pagination btn-outline-primary" @if(!$courses->hasMorePages()) disabled @endif>Next</button>
    </div>
</div>
