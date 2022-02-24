<x-app-layout>
<div class="max-w-7xl mx-auto bg-white p-8 my-4 rounded border border-gray-200">
    <h1 class="font-medium text-3xl">Edit product</h1>
    {{-- <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> --}}

    <form action="{{ route('editProduct') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}"/>
        <div class="mt-8 grid lg:grid-cols-2 gap-8 gap-x-16">
            <div>
            <label for="name" class="text-sm text-gray-700 block mb-1 font-medium">Product Name</label>
            <input type="text" name="name" id="name" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $product->name }}" value="{{ $product->name }}" />
            </div>

            <div>
            <label for="price" class="text-sm text-gray-700 block mb-1 font-medium">Price</label>
            <input type="number" name="price" id="price" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $product->price }}" value="{{ $product->price }}" />
            </div>

            <div>
            <label for="stock" class="text-sm text-gray-700 block mb-1 font-medium">Stock</label>
            <input type="number" name="stock" id="stock" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $product->stock }}" value="{{ $product->stock }}"/>
            </div>

            <div>
            <label for="category" class="text-sm text-gray-700 block mb-1 font-medium">Category</label>
            <input type="text" name="category" id="category" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $product->category_id }}" value="{{ $product->category_id }}" />
            </div>

            <div class="col-span-full">
            <label for="description" class="text-sm text-gray-700 block mb-1 font-medium">Description</label>
            <textarea cols="64" rows="8" type="text" name="description" id="description" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $product->description }}">{{ $product->description }}</textarea>
            </div>
        </div>

      <div class="space-x-4 mt-8">
        <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Save</button>

        <!-- Secondary -->
        <button class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Cancel</button>
      </div>
    </form>
  </div>
</x-app-layout>
