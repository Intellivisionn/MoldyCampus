<x-app-layout>
    <div>
        <div class="container">
            <h1>Search Results</h1>

            @if (!empty($results))
                <div class="mt-3">
                    <h5>Courses</h5>
                    <ul class="list-group">
                        @foreach ($results['courses'] as $course)
                            <li class="list-group-item">
                                <strong>{{ $course->name }}</strong> ({{ $course->code }})
                                <p>{{ $course->description }}</p>
                            </li>
                        @endforeach
                    </ul>

                    <h5 class="mt-3">Professors</h5>
                    <ul class="list-group">
                        @foreach ($results['professors'] as $professor)
                            <li class="list-group-item">
                                <strong>{{ $professor->name }}</strong> ({{ $professor->title }})
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p>No results found.</p>
            @endif
        </div>
    </div>
</x-app-layout>
