<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="container py-4 max-w-7xl mx-auto">
        <div class="grid grid-cols-4 grid-row-2 gap-8">
            @foreach ($products as $product)
                <x-product-card>
                  <x-slot name="name">{{ $product->name }}</x-slot>
                  <x-slot name="id">{{ $product->id }}</x-slot>
                  <x-slot name="description"> {{ $product->description}}</x-slot>
                  <x-slot name="price"> {{ $product->price}}</x-slot>
                </x-product-card>
            @endforeach
        </div>
    </div>
</x-app-layout>
