
<div>
    <header>
        <h2 class="text-lg font-medium text-black">
            {{ __('Add Course') }}
        </h2>

        <p class="mt-1 text-sm text-black">
            {{ __("Enter Details to add a course") }}
        </p>
    </header>


    <div class="mb-3">
        <label for="name" class="form-label">Course Name</label>
        <input type="text" class="form-control" id="name" name="name"  required> 
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Course ID</label>
        <input type="text" class="form-control" id="name" name="name"  required> 
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Course Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Lecturer</label>
        <input type="email" class="form-control" id="email" name="email"  required> 
    </div>

    <div class="mb-3">
        <label for="course_picture" class="form-label">Course Picture</label>
        <input type="file" class="form-control" id="course_picture" name="course_picture" accept="image/*">

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</div>