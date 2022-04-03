<a href="{{ route('product', ['id' => $id ]) }}" class="p-4 flex flex-col max-w-xs bg-white border-gray-200">
    <div class="flex-1 flex flex-col justify-center">
        <img class="max-h-64 max-w-64 object-scale-down" src="{{ route('product-image', ['product_id' => $id]) }}" alt=''/>
    </div>
    <p class="mt-3 font-bold">{{ $name }}</p>
    <p>{{ $price }}</p>
    <p>{{ $slot }}</p>
</a>
