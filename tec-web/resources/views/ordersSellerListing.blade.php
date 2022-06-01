<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Listing') }}
        </h2>
    </x-slot>
    <div class="flex flex-col max-w-7xl mx-auto">
        <div class="my-0 overflow-x-auto md:mx-0 xl:mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-0 lg:px-8">
            @if($orders && $order_items)
                @if($orders->count() > 0 && $order_items->count() > 0)
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="w-px px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:block" id="product_image">Image</th>
                                <th scope="col" id="product_name" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                <th scope="col" id="order_number" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Number</th>
                                <th scope="col" id="order_total" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th scope="col" id="order_date" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                                <th scope="col" id="status" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($order_items as $order_item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell" headers="product_image">
                                    <div class="flex-shrink-0 h-20 w-20">
                                        <a href="{{ route('product', ['id' => $order_item->product_id ]) }}">
                                            <img class="h-20 w-20 object-cover rounded" src="{{ route('product-image', $order_item->product_id) }}" alt="{{ $order_item->name }}">
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="product_name">
                                    <div class="text-base text-gray-900">{{ $order_item->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="order_number">
                                    <div class="text-base text-gray-900">#O-000{{ $order_item->order_id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="order_total">
                                    <div class="text-base font-medium text-gray-500">{{ $order_item->price }}$</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="order_date">
                                    <div class="text-base font-medium text-gray-500">{{ $orders->find($order_item->order_id)->order_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="status">
                                    <x-select onchange="location = this.value;">
                                        <option>{{ $order_item->status }}</option>
                                        @if($order_item->status != "Confirmed" && $order_item->status != "Shipped" && $order_item->status != "Delivered")
                                        <option value="{{ route('confirmOrderItem', ['order_item_id' => $order_item->id]) }}">Confirmed</option>
                                        @endif
                                        @if($order_item->status != "Shipped" && $order_item->status != "Delivered")
                                        <option value="{{ route('shipOrderItem', ['order_item_id' => $order_item->id]) }}">Shipped</option>
                                        @endif
                                        @if($order_item->status != "Delivered")
                                        <option value="{{ route('deliverOrderItem', ['order_item_id' => $order_item->id]) }}">Delivered</option>
                                        @endif
                                    </x-select>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="mt-6 flex items-center justify-center">
                    <p class="text-gray-700 text-2xl font-medium">Your order history is empty</p>
                </div>
                @endif
            @endif
            </div>
        </div>
    </div>
</x-app-layout>