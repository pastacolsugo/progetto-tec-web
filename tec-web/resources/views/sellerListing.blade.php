<x-app-layout>
    <x-slot name="header">Seller Listing</x-slot>
    <div class="flex flex-col max-w-7xl mx-auto">
    <div class="my-0 overflow-x-auto md:mx-0 xl:mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-0 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                <th scope="col" class="w-px px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:block">Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($products as $product)
                <x-table-listing>
                    <x-slot name="image">{{ route('product-image', [$product->id]) }}</x-slot>
                    <x-slot name="name">{{ $product->name }}</x-slot>
                    @if ($product->model != null)
                        <x-slot name="model">{{ $product->model }}</x-slot>
                    @endif
                    <x-slot name="id">{{ $product->id }}</x-slot>
                    <x-slot name="price">{{ $product->price }}€</x-slot>
                    <x-slot name="stock">{{ $product->stock }}</x-slot>
                    {{-- TODO: add product status column to DB --}}
                    <x-slot name="status">Active</x-slot>
                    <x-slot name="edit_href">{{ route('editProductListing', ['product_id' => $product->id]) }}</x-slot>
                </x-table-listing>
            @endforeach

            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</x-app-layout>
