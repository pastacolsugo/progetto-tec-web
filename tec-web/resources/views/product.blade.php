<x-app-layout>
<div class="max-w-7xl mx-auto bg-white p-8 my-4 rounded border border-gray-200">
    <div>
        <div class="flex lg:hidden">
            <h1 class="font-medium text-3xl">{{ $product->name }}</h1>
        </div>
        <div class="mt-8 grid lg:grid-cols-2 gap-8 gap-x-16">
            <div>
                <img class="max-h-80 object-scale-down" src="{{ route('product-image', ['product_id' => $product->id]) }}" alt="..."/>
            </div>

            <div class="flex flex-col">
                <h1 class="font-medium hidden lg:block text-3xl">{{ $product->name }}</h1>
                <p class="mt-16 text-md text-gray-700 block mb-1 font-medium">{{ $product->price }} €</p>
            </div>

            <div>
                <div>
                    @if ($product->stock > 5)
                        <p class="text-sm text-green-700 block mb-1 font-bold">Disponibile</p>
                    @elseif ($product->stock >= 1 and $product->stock <= 5)
                        <p class="text-sm text-orange-700 block mb-1 font-medium">Pochi pezzi rimanenti</p>
                    @else
                        <p class="text-sm text-red-700 block mb-1 font-medium">Esaurito</p>
                    @endif
                </div>
            </div>

            <div>
                <p class="text-sm text-gray-700 block mb-1 font-medium">Category</p>
                <input type="text" name="category" id="category" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $product->category_id }}" value="{{ $product->category_id }}" />
            </div>

            <div class="col-span-full whitespace-pre-line">
                <p>{{ $product->description }}</p>
            </div>

        </div>

    </div>
</div>
</x-app-layout>
