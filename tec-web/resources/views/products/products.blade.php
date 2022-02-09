@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card-grid">
            @foreach ($products as $product)
                <x-product-card>
                    <x-slot name="productName">{{ $product->name }}</x-slot>
                    <x-slot name="productGallery"> <img src={{ $product->gallery }} alt=""></x-slot>
                    <x-slot name="productDescription"> {{ $product->description}}</x-slot>
                    <x-slot name="productPrice"> {{ $product->price}}</x-slot>
                </x-product-card>
            @endforeach
        </div>
    </div>
@endsection



