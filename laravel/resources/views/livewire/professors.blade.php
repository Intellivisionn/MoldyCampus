<div>
    <!-- Category Buttons -->
    <div class="d-flex justify-content-center mt-3">
        <button wire:click="setCategory('top_rated')" class="btn btn-outline-secondary me-2">Top Rated</button>
        <button wire:click="setCategory('newly_rated')" class="btn btn-outline-secondary me-2">Newly Rated</button>
        <button wire:click="setCategory('most_popular')" class="btn btn-outline-secondary me-2">Most Popular</button>
        <button wire:click="setCategory('most_liked')" class="btn btn-outline-secondary">Most Liked</button>
    </div>

    <!-- Professors Section -->
    <div class="mt-4 position-relative">
        <h2 class="text-center mb-4">{{ $categories[$category] }}</h2>
        <div class="d-flex justify-content-center">
            <!-- Pagination Previous Button -->
            @if($currentPage > 1)
                <button wire:click="previousPage" class="btn btn-link position-absolute start-0 top-50 translate-middle-y" style="font-size: 2rem; color: black;">&lt;</button>
            @endif

            <!-- Professors Container -->
            <div class="professors-container d-flex flex-wrap justify-content-center" style="width: 80%;">
                @foreach($professors->forPage($currentPage, $itemsPerPage) as $professor)
                    <div class="professor-card text-center mx-2 mb-3">
                        <div class="card h-100 shadow-sm border-0">
                                                        <img src="{{ asset('images/professors/' . $professor['image']) }}" class="professor-img card-img-top img-fluid rounded-circle" alt="{{ $professor['name'] }}">
                            <div class="card-body d-flex flex-column justify-content-between text-center">
                                <h5 class="card-title text-truncate" style="max-width: 30ch;">{{ $professor['name'] }}</h5>
                                <p class="card-text">{{ $professor['department'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Next Button -->
            @if($currentPage < ceil($professors->count() / $itemsPerPage))
                <button wire:click="nextPage" class="btn btn-link position-absolute end-0 top-50 translate-middle-y" style="font-size: 2rem; color: black;">&gt;</button>
            @endif
        </div>
    </div>
</div>
