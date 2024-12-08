<div class="container vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="card w-75">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="flex-grow-1 text-center">
                <h2 class="mb-0">Edit Review</h2>
            </div>
            <button class="btn btn-secondary ms-auto" wire:click="goBack">
                <i class="fa fa-arrow-left"></i>
            </button>
        </div>
        <div class="card-body text-center">
            <p><strong>User Name:</strong> {{ $review->user->name ?? 'Unknown User' }}</p>
            <p><strong>User ID:</strong> {{ $review->user->id }}</p>
            <p><strong>Course:</strong> {{ $review->course->name ?? 'Unknown Course' }}</p>
            <p><strong>Rating:</strong> {{ $review->rating }} / 5</p>
            <p><strong>Review:</strong> {{ $review->review }}</p>

            <div class="mt-4">
                <button class="btn btn-danger me-2" wire:click="deleteReview({{ $review->id }})">
                    <i class="fa fa-trash"></i> Delete Rating
                </button>
                <button class="btn btn-warning" wire:click="clearReviewText({{ $review->id }})">
                    <i class="fa fa-eraser"></i> Clear Review Text
                </button>
            </div>
        </div>
    </div>
</div>