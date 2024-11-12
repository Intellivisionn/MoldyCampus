<div>
    <!-- Category Buttons -->
    <div class="mt-3 d-flex justify-content-center">
        <button wire:click="setCategory('most_popular')" class="btn btn-outline-secondary me-2">Most Popular</button>
        <button wire:click="setCategory('most_liked')" class="btn btn-outline-secondary">Most Liked</button>
    </div>

    <!-- Professors Section -->
    <div class="mt-4 position-relative">
        <h2 class="mb-4 text-center">{{ $categories[$category] }}</h2>
        <div class="d-flex justify-content-center">
            <!-- Pagination Previous Button -->
            @if ($currentPage > 1)
                <button wire:click="previousPage" class="btn btn-link position-absolute start-0 top-50 translate-middle-y"
                    style="font-size: 2rem; color: black;">&lt;</button>
            @endif

            <!-- Professors Container -->
            <div class="flex-wrap professors-container d-flex justify-content-center" style="width: 80%;">
                @foreach ($professors->forPage($currentPage, $itemsPerPage) as $professor)
                    <div class="mx-2 mb-3 text-center professor-card">
                        <div class="border-0 shadow-sm card h-100">
                            <img src="{{ file_exists(public_path('images/professors/' . $professor->image_path)) ? asset('images/professors/' . $professor->image_path) : asset('images/professors/no-image.jpg') }}"
                                class="professor-img card-img-top img-fluid rounded-circle"
                                alt="{{ $professor->name }}">
                            <div class="text-center card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title text-truncate" style="max-width: 30ch;">{{ $professor->name }}
                                </h5>
                                <p class="card-text">{{ $professor->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Next Button -->
            @if ($currentPage < ceil($professors->count() / $itemsPerPage))
                <button wire:click="nextPage" class="btn btn-link position-absolute end-0 top-50 translate-middle-y"
                    style="font-size: 2rem; color: black;">&gt;</button>
            @endif
        </div>
    </div>
</div>
