<form action="/search" method="GET" class="d-flex">
    @csrf
    <x-input name="query" class="form-control" value="{{ request()->get('query') }}"></x-input>
    <x-button class="btn">Search</x-button>
</form>
