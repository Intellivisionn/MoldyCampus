<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
    <!-- First Section: Delete Existing Courses -->
    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
        <div class="max-w-xl">
            <header>
                <h2 class="text-lg font-medium text-black">
                    {{ __('Delete Existing Courses') }}
                </h2>
            </header>

            @if (session()->has('message'))
                <div class="p-4 mb-4 text-green-800 bg-green-200 rounded">
                    {{ session('message') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="p-4 mb-4 text-red-800 bg-red-200 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mt-4">
                <input
                    type="text"
                    id="courseSearch"
                    class="block w-full px-4 py-2 text-sm text-black bg-gray-100 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                    placeholder="Search for a course"
                    oninput="filterCourses()">
            </div>

            <!-- Courses List -->
            <div class="mt-4">
                <ul id="courseList" class="space-y-2">
                    @foreach ($allCourses as $course)
                        <li class="p-4 bg-gray-50 border rounded shadow-sm">
                            <div class="flex items-center justify-between">
                                <span>{{ $course->name }} ({{ $course->code }})</span>
                                <button
                                    wire:click="deleteCourse({{ $course->id }})"
                                    class="btn btn-primary">
                                    Delete
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
        <div class="max-w-xl">
            <header>
                <h2 class="text-lg font-medium text-black">
                    {{ __('Delete Existing Professors') }}
                </h2>
            </header>

            <div class="mt-4">
                <input
                    type="text"
                    id="professorSearch"
                    class="block w-full px-4 py-2 text-sm text-black bg-gray-100 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                    placeholder="Search for a professor"
                    oninput="filterProfessors()">
            </div>

            <div class="mt-4">
                <ul id="professorList" class="space-y-2">
                    @foreach ($allProfessors as $professor)
                        <li class="p-4 bg-gray-50 border rounded shadow-sm">
                            <div class="flex items-center justify-between">
                                <span>{{ $professor->name }}</span>
                                <button
                                    wire:click="deleteProfessor({{ $professor->id }})"
                                    class="btn btn-primary">
                                    Delete
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function filterCourses() {
        const searchInput = document.getElementById('courseSearch').value.toLowerCase();
        const courseList = document.getElementById('courseList');
        const courses = courseList.getElementsByTagName('li');

        let visibleCount = 0;
        for (let i = 0; i < courses.length; i++) {
            const courseName = courses[i].getElementsByTagName('span')[0].textContent.toLowerCase();
            if (courseName.includes(searchInput) && visibleCount < 5) {
                courses[i].style.display = '';
                visibleCount++;
            } else {
                courses[i].style.display = 'none';
            }
        }
    }

    function filterProfessors() {
        const searchInput = document.getElementById('professorSearch').value.toLowerCase();
        const professorList = document.getElementById('professorList');
        const professors = professorList.getElementsByTagName('li');

        let visibleCount = 0;
        for (let i = 0; i < professors.length; i++) {
            const professorName = professors[i].getElementsByTagName('span')[0].textContent.toLowerCase();
            if (professorName.includes(searchInput) && visibleCount < 5) {
                professors[i].style.display = '';
                visibleCount++;
            } else {
                professors[i].style.display = 'none';
            }
        }
    }
</script>
