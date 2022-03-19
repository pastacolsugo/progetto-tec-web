<x-app-layout>
<div class="max-w-7xl mx-auto bg-white p-8 my-4 rounded border border-gray-200">
    <div class="flex justify-between">
        <h1 class="font-medium text-3xl">{{ $product->name }}</h1>
    </div>

    <div>
        <div class="mt-8 grid lg:grid-cols-2 gap-8 gap-x-16">
            <div>
                <img class="h-80" src="{{ route('product-image', ['product_id' => $product->id]) }}" alt="..."/>
            </div>

            <div>
                <p class="text-sm text-gray-700 block mb-1 font-medium">{{ $product->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-700 block mb-1 font-medium">{{ $product->price }} €</p>
            </div>

            <div>
                @if ($product->stock > 5)
                    <p class="text-sm text-green-700 block mb-1 font-bold">Disponibile</p>
                @elseif ($product->stock >= 1 and $product->stock <= 5)
                    <p class="text-sm text-orange-700 block mb-1 font-medium">Pochi pezzi rimanenti</p>
                @else
                    <p class="text-sm text-red-700 block mb-1 font-medium">Esaurito</p>
                @endif
            </div>

            <div>
                <p class="text-sm text-gray-700 block mb-1 font-medium">Category</p>
                <input type="text" name="category" id="category" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $product->category_id }}" value="{{ $product->category_id }}" />
            </div>

            <div class="col-span-full">
                <p>{{ $product->description }}</p>
            </div>

        </div>

      <div class="flex justify-end space-x-4 mt-8">
        <!-- Secondary -->
        <button type="reset" class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Reset</button>

        <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Save</button>
      </div>
    </form>
  </div>
</x-app-layout>
