<section>
    <header>
        <h2 class="text-lg font-medium text-black">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-black">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method='POST' action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="profile_picture" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
            @error('profile_picture')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mt-3">
                <img src="{{ auth()->user()->profile_picture ? ('/storage/' . auth()->user()->profile_picture) : ('/storage/profile_pictures/default.png') }}" alt="Current Profile Picture" class="img-thumbnail" style="max-width: 150px;">
                <p class="mt-2 text-sm text-muted">Current Profile Picture</p>
            </div>
            
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</section>