<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <div class="my-0 md:mx-0 xl:mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-0 lg:p-8 lg:pt-4">
                <div class="overflow-hidden sm:rounded-lg">
                    <label for="order_by">
                        <x-select id="order_by" onchange="location = this.value;" class="mx-2 form-select">
                            <option value="?query={{ $query }}">Sort by</option>
                            <option value="?query={{ $query }}&sortBy=ascendingPrice" {{ (request('sortBy') == 'ascendingPrice' ? 'selected=selected' : '') }}>Low to High</option>
                            <option value="?query={{ $query }}&sortBy=descendingPrice" {{ (request('sortBy') == 'descendingPrice' ? 'selected=selected' : '') }}>High to Low</option>
                        </x-select>
                    </label>
                    @if($query and $results)
                        @if($results->count() > 0)
                        <p class="mx-2 py-2 font-medium text-gray-700">Found {{ $results->total() }} results</p>
                        <div class="grid grid-rows-2 grid-cols-2 md:grid-cols-4 gap-3 m-6 justify-evenly">
                        @foreach ($results as $product)
                            <x-product-card>
                                <x-slot name="name">{{ $product->name }}</x-slot>
                                <x-slot name="id">{{ $product->id }}</x-slot>
                                <x-slot name="price"> {{ $product->price }} €</x-slot>
                                <x-slot name="description" class="truncate">{{ $product->description }}</x-slot>
                            </x-product-card>
                         @endforeach
                        </div>
                        <div class="mx-2 py-2">
                            {{ $results->links() }}
                        </div>
                        @else
                            <div class="alert alert-warning text-center pt-2" role="alert">No results for {{ $query }}</div>
                        @endif
                    @else
                        <p class="font-medium text-gray-700">Search fantastic products!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
