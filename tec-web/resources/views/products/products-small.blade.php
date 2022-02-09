@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div id="list-of-items">
           <x-product-card-small>
               <x-slot name="productName">{{  }}</x-slot>
               <x-slot name="productDescription"> {{  }}</x-slot>
               <x-slot name="productPrice"> {{  }}</x-slot>
           </x-product-card-small>
        </div>
    </div>
@endsection