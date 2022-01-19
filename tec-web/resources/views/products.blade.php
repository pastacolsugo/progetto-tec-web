<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="/css/products.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    {{ View::make('header') }}

   <div class="card-grid">
        @foreach ($products as $product)
            <x-product-card>
              <x-slot name="productName">{{ $product->name }}</x-slot>
              <x-slot name="productGallery"> {{ $product->gallery }}</x-slot>
              <x-slot name="productDescription"> {{ $product->description}}</x-slot>
              <x-slot name="productPrice"> {{ $product->price}}</x-slot>
            </x-product-card>
        @endforeach
    </div> 

</body>

</html>