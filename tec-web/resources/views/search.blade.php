<x-app-layout>
    <div class="container-fluid p-0 overflow-hidden">
        <x-select onchange="location = this.value;" class="form-select">
            <option value="">Sort by</option>
            <option value="?query=<?php echo request()->get('query')?>&sortBy=ascendingPrice" {{ (request('sortBy') == 'ascendingPrice' ? 'selected=selected' : '') }}>Low to High</option>
            <option value="?query=<?php echo request()->get('query')?>&sortBy=descendingPrice" {{ (request('sortBy') == 'descendingPrice' ? 'selected=selected' : '') }}>High to Low</option>
        </x-select>


    @if($query and $results)
        @if($results->count() > 0)
            <p class="py-2">Found {{ $results->total() }} results</p>
            <div class="card-grid">
                @foreach ($results as $product)
                    <x-product-card>
                        <x-slot name="name">{{ $product->name }}</x-slot>
                        <x-slot name="id">{{ $product->id }}</x-slot>
                        <x-slot name="price"> {{ $product->price}}$</x-slot>
                        {{ $product->description}}
                    </x-product-card>
                @endforeach
            </div>
                <div class="py-2">
                    {{ $results->links() }}
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center pt-2" role="alert">No results for {{ $query }}</div>
        @endif
    @else
        <p>Search fantastic products!</p>
    @endif
    </div>
</x-app-layout>
