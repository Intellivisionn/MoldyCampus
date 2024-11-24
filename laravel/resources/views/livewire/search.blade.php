<div>
    <form class="d-flex" action="{{ route('search.results') }}" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query"
            value="{{ old('query') }}">
    </form>
</div>
