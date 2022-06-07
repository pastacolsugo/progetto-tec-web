<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>
    <div class="flex flex-col max-w-7xl mx-auto">
        <div class="my-0 overflow-x-auto md:mx-0 xl:mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-0 lg:px-8">
            @if ($orders && $order_items)
                @if ($orders->count() <= 0 || $order_items->count() <= 0)
                    <div class="mt-6 flex items-center justify-center">
                        <p class="text-gray-700 text-2xl font-medium">Your order history is empty</p>
                    </div>
                @else
                    @foreach ($orders as $order)
                        <div class="mt-8 bg-neutral-500 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="flex justify-between">
                                <div class="mx-8 my-4 text-lg text-gray-50">Order {{ sprintf("#%05d", $order->id) }}</div>
                                <div class="mx-8 my-4 text-lg text-gray-50">{{ $order->order_date }}</div>
                                <div class="mx-8 my-4 text-lg text-gray-50">Total: {{ sprintf("%.2f", $order->order_total) }} €</div>
                            </div>
                            <table class="border-t min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="w-px px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:block" id="product_image">Image</th>
                                        <th scope="col" id="product_name" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                        <th scope="col" id="unit_price" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                                        <th scope="col" id="product_quantity" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th scope="col" id="product_total" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Total</th>
                                        <th scope="col" id="status" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($order_items as $order_item)
                                    @if ($order->id != $order_item->order_id)
                                        @continue
                                    @endif
                                    <tr>
                                        <td class="px-6 py-4 hidden md:block">
                                            <div class="flex-shrink-0 h-20 w-20 flex flex-col justify-center">
                                                <img class="max-h-20 max-w-[5rem] object-contain" src="{{ route('product-image', [$order_item->product_id]) }}" alt="">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" headers="product_name">
                                            <div class="text-base text-gray-900">{{ $order_item->name }}</div>

                                        <td class="px-6 py-4 whitespace-nowrap" headers="unit_price">
                                            <div class="text-base font-medium text-gray-500">{{ sprintf("%.2f", $order_item->price) }} €</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" headers="product_quantity">
                                            <div class="text-base font-medium text-gray-500">{{ $order_item->quantity }}x</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" headers="product_total">
                                            <div class="text-base font-medium text-gray-500">{{ sprintf("%.2f", $order_item->price * $order_item->quantity) }} €</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" headers="status">
                                            <div class="text-base font-medium text-gray-500">{{ $order_item->status }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                @endif
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
