<section>
    <header>
        <h2 class="text-lg font-medium text-black">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-black">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method='POST' action="{{ route('profile.update') }}" class="mt-6 space-y-6">
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

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</section>