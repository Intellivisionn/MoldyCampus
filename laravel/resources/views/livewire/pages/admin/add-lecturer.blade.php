<div>
    <header>
        <h2 class="text-lg font-medium text-black">
            {{ __('Add Lecturer or Proffesor') }}
        </h2>

        <p class="mt-1 text-sm text-black">
            {{ __("Enter Details to add a lecturer or proffesor") }}
        </p>
    </header>

    @if (session()->has('message'))
    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent="submit" class="mt-6 space-y-6">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="title" required>
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">E-mail</label>
           <!-- <input type="text" class="form-control" id="name" name="name" required> -->
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" required></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="profile_picture" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>