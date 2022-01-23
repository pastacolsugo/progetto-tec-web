<section>

    <div class="container py-4">
    @if($results)
        @if($results->count())
        <p>Found {{$results->total()}} results</p>
        <div class="card-grid">
            @foreach ($results as $result)
                <x-product-card>
                  <x-slot name="productName">{{ $result->name }}</x-slot>
                  <x-slot name="productGallery"> {{ $result->gallery }}</x-slot>
                  <x-slot name="productDescription"> {{ $result->description}}</x-slot>
                  <x-slot name="productPrice"> {{ $result->price}}$</x-slot>
                </x-product-card>
            @endforeach
        </div>
        
        <div class="space-y-4" >{{ $results }}</div>
        @else
        <div class="row">
            <p class="text-center badge bg-primary fs-6">No results for {{ request()->get('query') }}</p>
        </div>
        @endif 
    @else
    <div class="row">
            <p class="text-center badge bg-primary fs-6">No results for {{ request()->get('query') }}</p>
        </div>
    @endif
    </div>
</section>


