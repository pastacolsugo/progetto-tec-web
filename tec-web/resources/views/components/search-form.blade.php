<form action="{{ route('search') }}" method="GET" class="search-form">
        <input id="query" name="query" type="search" placeholder="Search" class="search-box" value="{{ request()->get('query') }}">
        <button type="submit" class="search-btn">Search</button>
</form>
