<div class="container-fluid vh-100 d-flex flex-column">
    <!-- Top text -->
    <div class="row">
        <div class="col-12 text-center py-4">
            <h1>Admin Panel</h1>
        </div>
    </div>

    <!-- Left and Right sides -->
    <div class="row flex-grow-1 m-4">
        <!-- Left side -->
        <div class="col-md-6 d-flex flex-column align-items-center">
            <h2 class="m-4">Search for User by Name</h2>
            <div class="input-group mb-3 w-75">
                <input type="text" class="form-control" placeholder="Enter user name" aria-label="User Name"
                    wire:model="search">
                <button class="btn btn-primary" wire:click="searchUsers">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            @if(!empty($users))
            <ul class="list-group w-75">
                @foreach ($users->take(10) as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $user->name }}
                    <div>
                        <span class="badge bg-primary rounded-pill">ID: {{ $user->id }}</span>
                        <button class="btn btn-danger btn-sm" wire:click="deleteUser({{ $user->id }})">
                            <i class="fa fa-trash"></i>
                        </button>
                        <button class="btn btn-warning btn-sm" wire:click="editUser({{ $user->id }})">
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <p>No users found.</p>
            @endif
        </div>

        <!-- Right side -->
        <div class="col-md-6 d-flex flex-column align-items-center">
            <h2 class="m-4">Recent 3 Reviews</h2>
            <ul class="list-unstyled w-75">
                @foreach ($reviews as $review)
                <li class="mb-3 border p-3 position-relative">
                    <div class="position-absolute top-0 end-0 m-2 d-flex">
                        <button class="btn btn-danger btn-sm me-2"  wire:click="deleteReview({{ $review->id }})">
                            <i class="fa fa-trash"></i>
                        </button>
                        <button class="btn btn-warning btn-sm" wire:click="editReview({{ $review->id }})">
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>

                    <div class="text-center">
                        <strong>User Name:</strong> {{ $review->user->name ?? 'Unknown User' }}, 
                        <strong>ID:</strong> {{ $review->user->id }}
                        <br><strong>Course:</strong> {{ $review->course->name ?? 'Unknown Course' }}
                        <br><strong>Review:</strong> {{ $review->rating }} / 5
                        <br>{{ $review->review }}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
