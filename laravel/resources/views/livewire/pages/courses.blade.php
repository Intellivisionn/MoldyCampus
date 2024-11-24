<div>
    <!-- Courses Section -->
    <div class="mt-4">
        <h2 class="mb-4 text-center"> Browse Courses </h2>
        <div class="container">
            <div class="row justify-content-center gx-4 gy-4">
                @foreach ($courses as $course)
                    <div class="col-md-3">
                        <div class="shadow-sm card h-100" style="background-color: rgba(255, 255, 255, 0); border: none;">
                            <img src="{{ file_exists(public_path('images/courses/' . $course->image_path))
                                ? asset('images/courses/' . $course->image_path)
                                : asset('images/courses/no-image.jpg') }}"
                                class="mx-auto course-card-img card-img-top img-fluid d-block" alt="{{ $course->name }}"
                                style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="text-center card-title text-truncate">{{ $course->name }}</h5>
                                <p class="card-text">{{ Str::limit($course->description, 50) }}</p>
                                <a href="{{ url('course/' . $course->id) }}" class="mt-auto btn btn-outline-primary rounded-pill">More
                                    Information</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Pagination Controls -->
    <div class="mt-4 d-flex justify-content-center">
        <button wire:click="previousPage" class="btn btn-pagination btn-outline-primary me-2"
            @if ($courses->onFirstPage()) disabled @endif>Previous</button>
        <span class="mx-3 align-self-center">Page {{ $courses->currentPage() }} of {{ $courses->lastPage() }}</span>
        <button wire:click="nextPage" class="btn btn-pagination btn-outline-primary"
            @if (!$courses->hasMorePages()) disabled @endif>Next</button>
    </div>
    <br>
</div>