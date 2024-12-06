<div class="p-5 container-fluid" style="height: 75vh;">
    <!-- First Main Row (66% of container height) -->
    <div class="d-flex flex-column" style="height: 66%;">
        <!-- 3:1 Split in Upper Row -->
        <div class="d-flex flex-column" style="height: 75%;">
            <!-- Row with 1:2 columns -->
            <div class="flex-row d-flex h-100">
                <!-- First column with image -->
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <img src="{{ file_exists(public_path('storage/' . $professor->image_path)) ? asset('storage/' . $professor->image_path) : asset('images/professors/no-image.jpg') }}"
                        alt="{{ $professor->name }}" style="object-fit: cover; width: 80%; height: 80%;">
                </div>
                <!-- Second column -->
                <div class="mt-5 col-8 d-flex">
                    <p>&emsp; {{ $professor['description'] }}
                    </p>
                </div>
            </div>
        </div>
        <!-- Second part of Upper Row Bottom (25% height) with 1:2 columns -->
        <div class="flex-row d-flex" style="height: 25%;">
            <div class="col-4 d-flex align-items-center justify-content-center">
                <h1 class="mb-0 fw-bold"> {{ $professor['name'] }}</h1>
            </div>
            <div class="col-8 align-items-center justify-content-around d-flex">
                <h4 class="mb-0">
                    @for ($i = 0; $i < floor($finalRating); $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor

                    @for ($i = 0; $i < 5 - floor($finalRating); $i++)
                        <i class="fa-regular fa-star"></i>
                    @endfor

                    {{ $finalRating }}/5
                </h4>
                <button type="button" class="btn btn-outline-secondary w-25">Contact Professor</button>
            </div>
        </div>
    </div>
    <!-- Row of Cards (34% of container height) -->
    <div class="d-flex align-items-center justify-content-center" style="height: 34%; overflow-y: hidden;">
        <!-- Card Container -->
        <div class="d-flex justify-content-around w-50" style="height: 100%;">
            <!-- Individual Card -->
            @foreach ($courses as $course)
                <a href='/course/{{ $course["id"] }}' class="text-center card text-decoration-none"
                    style="flex: 1 1 auto; margin: 0 10px; max-width: 20vw; max-height: 100%;">
                    <img src="{{ file_exists(public_path('storage/' . $course['image_path'])) ? asset('storage/' . $course['image_path']) : asset('images/courses/no-image.jpg') }}"
                        alt="{{ $course['name'] }}" class="img-fluid" style="object-fit: contain; max-height: 100px;">
                    <div class="card-body">
                        <p class="card-text">{{ $course['name'] }}</p>
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i
                                class="fa-regular fa-star"></i></p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
