<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="/css/products.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-0 overflow-hidden">
    <div class="row">
        <div class="col-12">
            <nav class="navbar bg-dark">
                <div class="px-2">
                    <x-select onchange="location = this.value;" class="form-select">
                        <option value="">Sort by</option>
                        <option value="?query=<?php echo request()->get('query')?>&sortBy=ascendingPrice" {{ (request('sortBy') == 'ascendingPrice' ? 'selected=selected' : '') }}>Low to High</option>
                        <option value="?query=<?php echo request()->get('query')?>&sortBy=descendingPrice" {{ (request('sortBy') == 'descendingPrice' ? 'selected=selected' : '') }}>High to Low</option>
                    </x-select>
                </div>
                <div class="pt-2 me-2">
                    <x-search-form/>
                </div>
            </nav>
        </div>
    </div>
    @if($results)
        @if($results->count())
        <p class="py-2">Found {{ $results->total() }} results</p>
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
            <div class="py-2">
                {{ $results->links() }}
            </div>
        </div>
        @else
        <div class="alert alert-warning text-center pt-2" role="alert">No results for {{ request()->get('query') }}</div>
        @endif 
    @else
    <div class="alert alert-warning text-center pt-2" role="alert">No results for {{ request()->get('query') }}</div>
    @endif
    </div>
</body>
</html>


