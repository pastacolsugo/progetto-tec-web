<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>
    <div class="flex flex-col max-w-7xl mx-auto">
        <div class="my-0 md:mx-0 overflow-x-auto xl:mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-0 lg:px-8">
                <table class="w-full text-sm lg:text-base">
                    <thead class="bg-gray-50">
                        <tr class="min-w-full divide-y divide-gray-200">
                            <th scope="col" class="w-px px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:block" id="product_image">Image</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" id="product_name">Product</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" id="quantity">Quantity</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:block" id="unit_price">Unit price</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" id="total_price">Total price</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($cart_items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell" headers="product_image">
                                <div class="flex-shrink-0 h-20 w-20">
                                    <a href="{{ route('product', ['id' => $item->product_id ]) }}">
                                        <img class="h-20 w-20 object-cover rounded" src="{{ route('product-image', $item->product_id) }}" alt="{{ $item->name }}">
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap" headers="product_name">
                                <a href="{{ route('product', ['id' => $item->product_id ]) }}">
                                    <p class="mb-2">{{ $item->name }}</p>
                                    <form action="{{ route('removeProductFromCart') }}" method="POST">
                                    @csrf
                                        <x-input type="hidden" name="product_id" value="{{ $item->product_id }}"/>
                                        <button type="submit" class="text-gray-700">
                                            <small>(Remove item)</small>
                                        </button>
                                    </form>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap" headers="quantity">
                                <div class="w-20 h-5">
                                    <div class="flex flex-row w-full">
                                        <form action="{{ route('addProductToCart') }}" method="POST">
                                        @csrf
                                            <x-input type="hidden" name="product_id" value="{{ $item->product_id }}"/>
                                            <x-input type="hidden" name="quantity" value="1"/>
                                            <button type="submit" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                        </form>
                                        <span class="mx-2"> {{ $item->quantity }} </span>
                                        <form action="{{ route('removeProductFromCart') }}" method="POST">
                                        @csrf
                                            <x-input type="hidden" name="product_id" value="{{ $item->product_id }}"/>
                                            <x-input type="hidden" name="quantity" value="1"/>
                                            <button type="submit" class="btn text-gray-500 focus:outline-none focus:text-gray-600">
                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell" headers="unit_price">
                                <div class="text-sm lg:text-base font-medium">{{ $item->price }}$</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap" headers="total_price">
                                <div class="text-sm lg:text-base font-medium">{{ $item->price * $item->quantity }}$</div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex items-center justify-center md:justify-end mx-2 mt-8">
                    <a href="{{ route('new-order') }}" class="btn flex px-6 py-3 bg-amber-400 text-gray-700 text-sm font-medium rounded-md focus:outline-none">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
        <!-- TODO #a11y: alt text -->
      <!--  <img src="{{ $item->image }}" alt=""/> -->
</x-app-layout>
