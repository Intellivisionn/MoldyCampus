<div>
    <header>
        <h2 class="text-lg font-medium text-black">
            {{ __('Add Course') }}
        </h2>

        <p class="mt-1 text-sm text-black">
            {{ __("Enter details to add a course") }}
        </p>
    </header>

    @if (session()->has('message'))
    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent="submit" class="mt-6 space-y-6">
        <!-- Course Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Course ID -->
        <div class="mb-3">
            <label for="code" class="form-label">Course ID</label>
            <input type="text" wire:model="code" class="form-control @error('code') is-invalid @enderror" id="code" required>
            @error('code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="professors" class="form-label fw-bold">Assign Professors</label>
            <select wire:model="selectedProfessors" class="form-select @error('selectedProfessors') is-invalid @enderror" id="professors" multiple size="5">
                @foreach ($allProfessors as $prof)
                <option value="{{ $prof->id }}">{{ $prof->name }}</option>
                @endforeach
            </select>
            @error('selectedProfessors') <span class="invalid-feedback">{{ $message }}</span> @enderror
            <small class="text-muted">Hold CTRL (Windows) or CMD (Mac) to select multiple professors.</small>
        </div>


        <!-- Course Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Course Description</label>
            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" required></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>


        <!-- Course Picture NEED TO MAKE WORK -->
        <div class="mb-3">
            <label for="course_picture" class="form-label">Course Picture</label>
            <input
                type="file"
                wire:model="course_picture"
                class="form-control @error('course_picture') is-invalid @enderror"
                id="course_picture"
                accept="image/*">

            @error('course_picture')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div wire:loading wire:target="course_picture" class="text-gray-600 text-sm mt-1">
                Uploading...
            </div>

            @if ($course_picture)
            <div class="mt-2">
                <!-- Display a temporary preview before submission -->
                <img src="{{ $course_picture->temporaryUrl() }}" alt="Course Picture" class="h-20">
            </div>
            @endif
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>