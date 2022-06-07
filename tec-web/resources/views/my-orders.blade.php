<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ordini') }}
        </h2>
    </x-slot>
    <div class="flex flex-col max-w-7xl mx-auto">
        <div class="my-0 overflow-x-auto md:mx-0 xl:mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-0 lg:px-8">
            @if ($orders && $order_items)
                @if ($orders->count() <= 0 || $order_items->count() <= 0)
                    <div class="mt-6 flex items-center justify-center">
                        <p class="text-gray-700 text-2xl font-medium">La tua cronologia ordini è vuota</p>
                    </div>
                @else
                    @foreach ($orders as $order)
                        <div class="mt-8 bg-neutral-500 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="flex justify-between">
                                <div class="mx-8 my-4 text-gray-600">Ordine: {{ sprintf("#%05d", $order->id) }}</div>
                                <div class="mx-8 my-4 text-lg text-gray-50">{{ $order->order_date }}</div>
                                <div class="mx-8 my-4 text-gray-600">Totale: {{ sprintf("%.2f", $order->order_total) }} €</div>
                            </div>
                            <table class="border-t min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="w-px px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:block" id="product_image{{ $order->id }}">Immagine</th>
                                        <th scope="col" id="product_name{{ $order->id }}" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodotto</th>
                                        <th scope="col" id="unit_price{{ $order->id }}" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prezzo Unitario</th>
                                        <th scope="col" id="product_quantity{{ $order->id }}" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantità</th>
                                        <th scope="col" id="product_total{{ $order->id }}" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Totale Prodotto</th>
                                        <th scope="col" id="status{{ $order->id }}" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($order_items as $order_item)
                                    @if ($order->id != $order_item->order_id)
                                        @continue
                                    @endif
                                    <tr>
                                        <td class="px-6 py-4 hidden md:block" headers="product_image{{ $order->id }}">
                                            <div class="flex-shrink-0 h-20 w-20 flex flex-col justify-center">
                                                <img class="max-h-20 max-w-[5rem] object-contain" src="{{ route('product-image', [$order_item->product_id]) }}" alt="">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" headers="product_name{{ $order->id }}">
                                            <div class="text-base text-gray-900">{{ $order_item->name }}</div>

                                        <td class="px-6 py-4 whitespace-nowrap" headers="unit_price">
                                            <div class="text-base font-medium text-gray-500">{{ sprintf("%.2f", $order_item->price) }} €</div>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" headers="product_quantity{{ $order->id }}">
                                            <div class="text-base font-medium text-gray-500">{{ $order_item->quantity }}x</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap" headers="product_total">
                                            <div class="text-base font-medium text-gray-500">{{ sprintf("%.2f", $order_item->price * $order_item->quantity) }} €</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap" headers="status{{ $order->id }}">
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
