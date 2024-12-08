<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card w-75">
        <div class="card-header text-center">
            <h2>User</h2>
        </div>
        <div class="card-body">
            @if($user)
                <h3><strong>User Name:</strong> {{ $user->name }}</h3>
                <h3><strong>User ID:</strong> {{ $user->id }}</h3>

                <h3><strong>User Reviews:</strong></h3>
                @if($userReviews->isNotEmpty())
                    <ul class="list-group">
                        @foreach ($userReviews as $review)
                            <li class="list-group-item mb-3 border p-3 position-relative">
                                <div class="position-absolute top-0 end-0 m-2 d-flex">
                                    <button class="btn btn-danger btn-sm me-2" wire:click="deleteReview({{ $review->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm" wire:click="editReview({{ $review->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </div>

                                <div class="text-center">
                                    <strong>User Name:</strong> {{ $review->user->name ?? 'Unknown User' }}, 
                                    <strong>ID:</strong> {{ $review->user->id ?? 'N/A' }}
                                    <br><strong>Course:</strong> {{ $review->course->name ?? 'Unknown Course' }}
                                    <br><strong>Review:</strong> {{ $review->rating }} / 5
                                    <br>{{ $review->review }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No reviews found for this user.</p>
                @endif

                <div class="text-center mt-4">
                    <button class="btn btn-danger" wire:click="deleteUser({{ $user->id }})">
                        Delete User
                    </button>
                </div>
            @else
                <p>User not found.</p>
            @endif
        </div>
    </div>
</div>