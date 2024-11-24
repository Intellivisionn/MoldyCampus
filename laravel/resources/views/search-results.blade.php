<x-app-layout>
    <div class="text-center">
        <h1 class="mb-6 text-2xl font-bold">Search Results</h1>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <h5 class="text-lg font-semibold">Courses</h5>
                    @if (!empty($results['courses']) && $results['courses']->isNotEmpty())
                        @foreach ($results['courses'] as $course)
                            <div class="mb-2">
                                <a class="text-decoration-none" style="color: gray" href="{{ route('course.show', $course->id) }}">
                                    <strong>{{ $course->name }}</strong> ({{ $course->code }})
                                    <p>{{ $course->description }}</p>
                                </a>
                            </div>
                        @endforeach
                    @else
                            <p>No courses found.</p>
                    @endif
            </div>

            <div>
                <h5 class="text-lg font-semibold">Professors</h5>
                    @if (!empty($results['professors']) && $results['professors']->isNotEmpty())
                        @foreach ($results['professors'] as $professor)
                            <div class="mb-2"><a class="text-decoration-none"style="color: gray" href="{{ route('professor.show', $professor->id) }}">
                                <strong>{{ $professor->name }}</strong> ({{ $professor->title }})
                            </div></a>
                        @endforeach
                    @else
                            <p>No professors found.</p>
                    @endif
            </div>
        </div>
    </div>
</x-app-layout>
