<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body>
    TEST VIEW
    @foreach ($products as $product)
        <!-- <p>{{$product->name}}</p> -->
        <x-product-card>
            <x-slot name="productName">{{ $product->name }}</x-slot>
            <p>Questo prodotto e' proprio carino.</p>
        </x-product-card>
    @endforeach
</body>
</html>
