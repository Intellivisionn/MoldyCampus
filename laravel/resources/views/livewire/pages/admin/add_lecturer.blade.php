
<div>
    <header>
        <h2 class="text-lg font-medium text-black">
            {{ __('Add Lecturer or Proffesor') }}
        </h2>

        <p class="mt-1 text-sm text-black">
            {{ __("Enter Details to add a lecturer or proffesor") }}
        </p>
    </header>


    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name"  required> 
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Surname</label>
        <input type="text" class="form-control" id="name" name="name"  required> 
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="name" name="name"  required> 
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="profile_picture" class="form-label">Profile Picture</label>
        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</div>