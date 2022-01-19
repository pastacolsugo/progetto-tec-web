@if($results)
    <div class="space-y-4">
        @if($results->count())
            @foreach($results as $result)
            @endforeach
        @else
            <p>No results found</p>
        @endif
    </div>
@endif