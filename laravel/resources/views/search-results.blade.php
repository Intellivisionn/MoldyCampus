<x-app-layout>
    <div class="text-center">
        <h1 class="mb-6 text-2xl font-bold">Search Results</h1>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <h5 class="text-lg font-semibold">Courses</h5>
                <ul class="list-none">
                    @if (!empty($results['courses']) && $results['courses']->isNotEmpty())
                        @foreach ($results['courses'] as $course)
                            <li class="mb-4">
                                <strong>{{ $course->name }}</strong> ({{ $course->code }})
                                <p>{{ $course->description }}</p>
                            </li>
                        @endforeach
                    @else
                        <li>
                            <p>No courses found.</p>
                        </li>
                    @endif
                </ul>
            </div>

            <div>
                <h5 class="text-lg font-semibold">Professors</h5>
                <ul class="list-none">
                    @if (!empty($results['professors']) && $results['professors']->isNotEmpty())
                        @foreach ($results['professors'] as $professor)
                            <li class="mb-4">
                                <strong>{{ $professor->name }}</strong> ({{ $professor->title }})
                            </li>
                        @endforeach
                    @else
                        <li>
                            <p>No professors found.</p>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
