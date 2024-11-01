<div>
    <div class="d-flex justify-content-center mt-3">
        <button wire:click="setCategory('trending')" class="btn btn-outline-secondary me-2">Trending Now</button>
        <button wire:click="setCategory('newly_added')" class="btn btn-outline-secondary me-2">Newly Added</button>
        <button wire:click="setCategory('top_rated')" class="btn btn-outline-secondary me-2">Top Rated</button>
        <button wire:click="setCategory('most_popular')" class="btn btn-outline-secondary me-2">Most Popular</button>
        <button wire:click="setCategory('recently_reviewed')" class="btn btn-outline-secondary">Recently Reviewed</button>
    </div>
    <h2 class="text-center mb-4">{{ $categories[$category] }}</h2>
    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $course['title'] }}</h5>
                        <p class="card-text">{{ $course['code'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
