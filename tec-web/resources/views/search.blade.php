@if($results)
    <div class="space-y-4">
        @if($results->count())
            @foreach($results as $result)
                <p>{{ $result->name }}</p>
                <!-- Proof of concept -->
                <!-- Basic way to show search results -->
                <!-- @Alice Feel free to replace with more complete version -->
            @endforeach
        @else
            <p>No results found</p>
        @endif
    </div>
@endif
