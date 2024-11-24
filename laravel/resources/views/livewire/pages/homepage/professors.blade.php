<div>
    <!-- Category Buttons -->
    <div class="mt-3 d-flex justify-content-center">
        <button wire:click="setCategory('top_rated')" class="btn btn-outline-secondary me-2">Top Rated</button>
        <button wire:click="setCategory('most_reviewed')" class="btn btn-outline-secondary me-2">Most Reviewed</button>
    </div>

    <!-- Professors Section -->
    <div class="mt-4 position-relative">
        <h2 class="mb-4 text-center">{{ $categories[$category] }}</h2>
        <div class="d-flex justify-content-center">
            <!-- Professors Container -->
            <div class="flex-wrap professors-container d-flex justify-content-center" style="width: 80%;">
                @foreach ($professors as $professor)
                    <div class="mx-2 mb-3 text-center professor-card" style="width: 250px; height: 350px;">
                        <a href="{{ url('professor/' . $professor->id) }}" class="text-decoration-none">
                            <div class="border-0 shadow-sm card h-100"
                                style="background-color: rgba(255, 255, 255, 0); border: none;">
                                <img src="{{ file_exists(public_path('images/professors/' . $professor->image_path)) ? asset('images/professors/' . $professor->image_path) : asset('images/professors/no-image.jpg') }}"
                                    class="professor-img card-img-top img-fluid rounded-circle"
                                    alt="{{ $professor->name }}" style="object-fit: cover; height: 200px;">
                                <div class="text-center card-body d-flex flex-column justify-content-center">
                                    <h5 class="card-title text-truncate" style="max-width: 30ch;">{{ $professor->name }}
                                    </h5>
                                    <p class="card-text">{{ $professor->title }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
