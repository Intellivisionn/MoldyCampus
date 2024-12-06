<div class="py-12 bg-gray-100">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg flex items-center justify-center">
            <div class="max-w-xl">
                <h2>Staff Panel</h2>
            </div>
        </div>
    </div>
    <div class="mt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Flex container for side-by-side layout -->
        <div class="flex flex-wrap gap-6 justify-between">
            <div class="flex-1 p-4 bg-white shadow sm:p-8 sm:rounded-lg max-w-sm">
                <div class="flex items-center justify-between">
                    <h4>Add Course</h4>
                    <a href="{{ route('addCourse') }}" class="bg-gray-300 hover:bg-gray-200 text-black font-bold py-3 px-6 rounded">
                        +
                    </a>
                </div>
            </div>
            <div class="flex-1 p-4 bg-white shadow sm:p-8 sm:rounded-lg max-w-sm">
                <div class="flex items-center justify-between">
                    <h4>Add Professor</h4>
                    <a href="{{ route('addProfessor') }}" class="bg-gray-300 hover:bg-gray-200 text-black font-bold py-3 px-6 rounded">
                        +
                    </a>
                </div>
            </div>
            <div class="flex-1 p-4 bg-white shadow sm:p-8 sm:rounded-lg max-w-sm">
                <div class="flex items-center justify-between">
                    <h4>Manage Admins</h4>
                    <a href="{{ route('manageAdmins') }}" class="bg-gray-300 hover:bg-gray-200 text-black font-bold py-3 px-6 rounded">
                        +
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Flex container for side-by-side layout -->
        <div class="flex flex-wrap gap-6 justify-between">
            
            <div class="flex-1 p-4 bg-white shadow sm:p-8 sm:rounded-lg max-w-sm">
                <div class="flex items-center justify-between">
                    <h4>Total Courses</h4>
                    <span class="text-2xl font-bold">{{ $courseCount }}</span>
                </div>
            </div>
            <div class="flex-1 p-4 bg-white shadow sm:p-8 sm:rounded-lg max-w-sm">
                <div class="flex items-center justify-between">
                    <h4>Total Lecturers</h4>
                    <span class="text-2xl font-bold">{{ $professorCount }}</span>
                </div>
            </div>
            <div class="flex-1 p-4 bg-white shadow sm:p-8 sm:rounded-lg max-w-sm">
                <div class="flex items-center justify-between">
                    <h4>Total Users</h4>
                    <span class="text-2xl font-bold">{{ $userCount }}</span>
                </div>
            </div>
        </div>
    </div>
</div>