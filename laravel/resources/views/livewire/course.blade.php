<div>
    <div class="container-fluid" style="box-sizing: border-box; padding: 5vw; height: 75vh;">
        <div class="row h-100">
            <!-- First Column (2/3 width) -->
            <div class="px-0 mx-0 col-8 d-flex flex-column">
                <div class="position-relative" style="height: 33.33%; overflow: hidden;">
                    <img src="{{ file_exists(public_path('images/courses/' . $course->image_path))
                        ? asset('images/courses/' . $course->image_path)
                        : asset('images/courses/no-image.jpg') }}"
                        alt="Image" class="position-absolute w-100 h-100" style="object-fit: cover; top: 0; left: 0;">
                </div>
                <div class="pt-3 mx-5 d-flex justify-content-center flex-grow-1 " style="flex-basis: 33.33%;">
                    <p>
                        &emsp;{{ $course->description }}
                    </p>
                </div>
                <div class="d-flex justify-content-center flex-grow-1" style="flex-basis: 33.33%; max-height: 33.33%">
                    <div class="d-flex justify-content-around w-100" style="height: 100%;">
                        <!-- Individual Card -->
                        @if (count($reviews) > 0)
                            @foreach ($reviews as $review)
                                @if (!empty($review['review']))
                                    <div class="mx-3 text-center card" style="flex: 1 1 auto; max-height: 100%; max-width: 20vw;">
                                        <div class="card-body">
                                            <p class="card-text"> {{ $review['student_name'] }}&emsp;
                                                {{ $review['rating'] }}/5</p>
                                            <p class="text-sm"> {{ $review['review'] }} </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <h2>No Reviews</h2>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Second Column (1/3 width) -->
            <div class="col-4 d-flex flex-column">
                <div class="d-flex justify-content-center flex-grow-1 flex-column"
                    style="flex-basis: 16.67%; padding-left: 4vw;">
                    <span class='fw-bold'>
                        <h1>{{ $course->name }}</h1>
                    </span>
                    <h5>Course ID: {{ $course->code }}</h5>
                </div>
                <hr>
                <div class="d-flex align-items-center justify-content-center flex-grow-1 flex-column"
                    style="flex-basis: 33.33%;">
                    <!-- Title at the top -->
                    <h3 class="mb-3">Professors</h3>

                    <!-- Row of Cards -->
                    <div class="d-flex flex-grow-1 justify-content-around">
                        <!-- Individual Card -->
                        @if (count($professors) > 0)
                            @foreach ($professors as $professor)
                                <a href='/professor/{{ $professor["id"] }}'
                                    class="text-center card d-flex flex-column align-items-start text-decoration-none"
                                    style="flex: 1 1 auto; margin: 0 10px; max-width: 120px; max-height: 220px;">
                                    <img src="{{ file_exists(public_path('images/professors/' . $professor['image_path']))
                                        ? asset('images/professors/' . $professor['image_path'])
                                        : asset('images/professors/no-image.jpg') }}"
                                        alt="Card Image" class="img-fluid"
                                        style="object-fit: contain; max-height: 150px;">
                                    <div class="card-body">
                                        <p class="card-text"> {{ $professor['name'] }} </p>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <h2>No Professors Specified</h2>
                        @endif

                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-center flex-grow-1 flex-column" style="flex-basis: 35%;">
                    @if (count($reviews) > 0)
                        <div class="d-flex flex-grow-1 justify-content-between">
                            <h4 class="mb-3">
                                @for ($i = 0; $i < floor($finalRating); $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor

                                @for ($i = 0; $i < 5 - floor($finalRating); $i++)
                                    <i class="fa-regular fa-star"></i>
                                @endfor
                                {{ $finalRating }} / 5
                            </h4>
                            <h4>#143</h4>
                        </div>
                        <div class="d-flex flex-grow-1 justify-content-center align-items-center flex-column">
                            <p class="mb-0">Course material&emsp;
                                @for ($i = 0; $i < floor($finalRating); $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor

                                @for ($i = 0; $i < 5 - floor($finalRating); $i++)
                                    <i class="fa-regular fa-star"></i>
                                @endfor
                            </p>
                            <p class="mb-0">Interactivity&emsp;
                                @for ($i = 0; $i < floor($finalRating); $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor

                                @for ($i = 0; $i < 5 - floor($finalRating); $i++)
                                    <i class="fa-regular fa-star"></i>
                                @endfor
                            </p>
                            <p class="mb-0">Use of technology&emsp;
                                @for ($i = 0; $i < floor($finalRating); $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor

                                @for ($i = 0; $i < 5 - floor($finalRating); $i++)
                                    <i class="fa-regular fa-star"></i>
                                @endfor
                            </p>
                        </div>
                    @else
                        <h2>No ratings</h2>
                    @endif
                </div>
                <hr>
                <div class="d-flex justify-content-center flex-grow-1" style="flex-basis: 15%;">
                    <button type="button" class="btn btn-outline-secondary w-100">Go to university page</button>
                </div>

                @if (auth()->check())
                    <div style="height: 10px"></div>
                    <div class="d-flex justify-content-center flex-grow-1" style="flex-basis: 15%;">
                        <button type="button" class="btn btn-outline-secondary w-100" wire:click="openModal">
                            @if ($review)
                                Your Rating
                            @else
                                Add Rating
                            @endif
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div><!-- resources/views/livewire/star-rating.blade.php -->

    <!-- Modal Structure -->
    @if ($isModalOpen)
        <div class="modal show d-block" tabindex="-1" role="dialog" id="addReview" wire:key="review-modal" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Rate {{ $course->name }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Overall Score -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Overall Score</h4>
                            <h4 class="mb-0 ms-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button" wire:click="setRating('overall', {{ $i }})" class="star-btn">
                                        <i class="{{ $i <= $categoryScores['overall'] ? 'fa-solid fa-star' : 'fa-regular fa-star' }}"></i>
                                    </button>
                                @endfor
                            </h4>
                        </div>

                        <hr>
                        <p style="color: #AAA">(Optional)</p>

                        <!-- Course Material Rating -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Course material</h6>
                            <h6 class="mb-0 ms-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button" wire:click="setRating('course_material', {{ $i }})" class="star-btn">
                                        <i class="{{ $i <= $categoryScores['course_material'] ? 'fa-solid fa-star' : 'fa-regular fa-star' }}"></i>
                                    </button>
                                @endfor
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Interactivity</h6>
                            <h6 class="mb-0 ms-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button" wire:click="setRating('interactivity', {{ $i }})" class="star-btn">
                                        <i class="{{ $i <= $categoryScores['interactivity'] ? 'fa-solid fa-star' : 'fa-regular fa-star' }}"></i>
                                    </button>
                                @endfor
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Use of technology</h6>
                            <h6 class="mb-0 ms-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button" wire:click="setRating('technology', {{ $i }})" class="star-btn">
                                        <i class="{{ $i <= $categoryScores['technology'] ? 'fa-solid fa-star' : 'fa-regular fa-star' }}"></i>
                                    </button>
                                @endfor
                            </h6>
                        </div>
                        <div class="mt-4">
                            <label for="reviewText" class="form-label">Your Review</label>
                            <textarea id="reviewText" class="form-control" wire:model="reviewText" rows="4" placeholder="Write your review here..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" wire:click="removeRating" class="btn btn-danger">Remove</button>
                        <button type="button" wire:click="submitRating" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* Ensure the background overlay effect */
            .modal.show.d-block {
                display: block;
                background-color: rgba(0, 0, 0, 0.5);
            }
        </style>
    @endif
</div>