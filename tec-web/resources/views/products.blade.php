<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="container py-4">
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
    </div>
</x-app-layout>
