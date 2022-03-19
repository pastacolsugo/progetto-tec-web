<a href="{{ route('product', ['id' => $id ]) }}" class="p-4 flex flex-col max-w-xs bg-white border-gray-200">
    <div class="flex-1 flex flex-col justify-center">
        <img class="max-w-sx" src="{{ route('product-image', ['product_id' => $id]) }}" alt='...'/>
    </div>
    <strong>{{ $name }}</strong>
    <p>{{ $price }}</p>
    <p>{{ $slot }}</p>
</a>
