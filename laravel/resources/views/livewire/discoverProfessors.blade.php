<div>

    <!-- Professors Section -->
    <div class="mt-4">
        <h2 class="mb-4 text-center"> Browse Professors </h2>
        <div class="container">
            <div class="row justify-content-center gx-4 gy-4">
                @foreach ($professors as $professor)
                    <div class="col-md-3">
                        <div class="shadow-sm card h-100" style="background-color: rgba(255, 255, 255, 0); border: none;">
                            <img src="{{ file_exists(public_path('images/professors/' . $professor->image_path)) ? asset('images/professors/' . $professor->image_path) : asset('images/professors/no-image.jpg') }}"
                                class="mx-auto professor-card-img card-img-top img-fluid d-block rounded-circle"
                                alt="{{ $professor->name }}" style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">{{ $professor->name }}</h5>
                                <p class="card-text">{{ $professor->title }}</p>
                                <a href="{{ url('professor/' . $professor->id) }}" class="mt-auto btn btn-outline-primary rounded-pill">More
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
            @if ($professors->onFirstPage()) disabled @endif>Previous</button>
        <span class="mx-3 align-self-center">Page {{ $professors->currentPage() }} of
            {{ $professors->lastPage() }}</span>
        <button wire:click="nextPage" class="btn btn-pagination btn-outline-primary"
            @if (!$professors->hasMorePages()) disabled @endif>Next</button>
    </div>
    <br>
</div>
