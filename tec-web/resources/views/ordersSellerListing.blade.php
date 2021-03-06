<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestione Ordini') }}
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
                                <th scope="col" class="w-px px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:block" id="product_image">Immagine</th>
                                <th scope="col" id="product_name" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodotto</th>
                                <th scope="col" id="order_number" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numero Ordine</th>
                                <th scope="col" id="order_total" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Totale</th>
                                <th scope="col" id="order_date" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Ordine</th>
                                <th scope="col" id="status" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($order_items as $order_item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell" headers="product_image">
                                    <div class="flex-shrink-0 h-20 w-20">
                                        <a href="{{ route('product', ['id' => $order_item->product_id ]) }}">
                                            <img class="max-h-20 max-w-[5rem] object-contain" src="{{ route('product-image', $order_item->product_id) }}" alt="{{ $order_item->name }}">
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="product_name">
                                    <div class="text-base text-gray-900">{{ $order_item->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="order_number">
                                    <div class="text-base text-gray-900">{{ sprintf("#%05d", $order_item->order_id) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="order_total">
                                    <div class="text-base font-medium text-gray-500">{{ $order_item->price }}???</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="order_date">
                                    <div class="text-base font-medium text-gray-500">{{ $orders->find($order_item->order_id)->order_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" headers="status">
                                    <label for="change_status{{ $order_item->id }}" class="hidden">Change status</label>
                                    <x-select id="change_status{{ $order_item->id }}" onchange="location = this.value;">
                                        <option>{{ $order_item->status }}</option>
                                        @if($order_item->status != "Confermato" && $order_item->status != "Spedito" && $order_item->status != "Consegnato")
                                            <option value="{{ route('seller-confirm-order-item', ['order_item_id' => $order_item->id]) }}">Confermato</option>
                                        @elseif($order_item->status != "Spedito" && $order_item->status != "Consegnato")
                                            <option value="{{ route('seller-ship-order-item', ['order_item_id' => $order_item->id]) }}">Spedito</option>
                                        @elseif($order_item->status != "Consegnato")
                                            <option value="{{ route('seller-deliver-order-item', ['order_item_id' => $order_item->id]) }}">Consegnato</option>
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
                    <p class="text-gray-700 text-2xl font-medium">La tua cronologia ordini ?? vuota</p>
                </div>
                @endif
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
