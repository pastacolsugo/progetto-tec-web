<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrello') }}
        </h2>
    </x-slot>
    <div class="flex flex-col max-w-7xl mx-auto">
        <div class="my-0 md:mx-0 overflow-x-auto xl:mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-0 lg:px-8">
            @if($cart_items)
                @if($cart_items->count() > 0)
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if (session('Message'))
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p>{{ session('Message') }}</p>
                        </div>
                    @endif
                        <table class="w-full text-sm lg:text-base">
                            <thead class="bg-gray-50">
                                <tr class="min-w-full divide-y divide-gray-200">
                                    <th scope="col" class="w-px px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell" id="product_image">Immagine</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" id="product_name">Prodotto</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell" id="quantity">Quantità</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell" id="unit_price">Prezzo unitario</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" id="total_price">Prezzo totale</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($cart_items as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell" headers="product_image">
                                        <div class="flex-shrink-0 h-20 w-20 flex flex-col justify-center">
                                            <a href="{{ route('product', ['id' => $item->product_id ]) }}">
                                                <img class="max-h-20 max-w-[5rem] object-contain" src="{{ route('product-image', $item->product_id) }}" alt="{{ $item->name }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap" headers="product_name">
                                        <a href="{{ route('product', ['id' => $item->product_id ]) }}">
                                            <p class="mb-2 truncate">{{ $item->name }}</p>
                                        </a>
                                        <div class="flex flex-row justify-around md:justify-start">
                                            <form action="{{ route('removeProductFromCart') }}" method="POST">
                                            @csrf
                                                <x-input type="hidden" name="product_id" value="{{ $item->product_id }}"/>
                                                <input type="hidden" name="deleteAll" value="1"/>
                                                <button type="submit" class="text-gray-700">
                                                    <small>( Rimuovi )</small>
                                                </button>
                                            </form>
                                            <div class="flex flex-row md:hidden">
                                                <form action="{{ route('removeProductFromCart') }}" method="POST">
                                                @csrf
                                                    <x-input type="hidden" name="product_id" value="{{ $item->product_id }}"/>
                                                    <x-input type="hidden" name="quantity" value="1"/>
                                                    <button type="submit" class="btn text-gray-500 focus:outline-none focus:text-gray-600">
                                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    </button>
                                                </form>
                                                <span class="mx-2"> {{ $item->quantity }} </span>
                                                <form action="{{ route('addProductToCart') }}" method="POST">
                                                @csrf
                                                    <x-input type="hidden" name="product_id" value="{{ $item->product_id }}"/>
                                                    <x-input type="hidden" name="quantity" value="1"/>
                                                    <button type="submit" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell" headers="quantity">
                                        <div class="w-20 h-5">
                                            <div class="flex flex-row w-full">
                                                <form action="{{ route('removeProductFromCart') }}" method="POST">
                                                @csrf
                                                    <x-input type="hidden" name="product_id" value="{{ $item->product_id }}"/>
                                                    <x-input type="hidden" name="quantity" value="1"/>
                                                    <button type="submit" class="btn text-gray-500 focus:outline-none focus:text-gray-600">
                                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    </button>
                                                </form>
                                                <span class="mx-2"> {{ $item->quantity }} </span>
                                                <form action="{{ route('addProductToCart') }}" method="POST">
                                                @csrf
                                                    <x-input type="hidden" name="product_id" value="{{ $item->product_id }}"/>
                                                    <x-input type="hidden" name="quantity" value="1"/>
                                                    <button type="submit" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell" headers="unit_price">
                                        <div class="text-sm lg:text-base font-medium">{{ sprintf("%.2f €", $item->price) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap" headers="total_price">
                                        <div class="text-sm lg:text-base font-medium">{{ sprintf("%.2f €", $item->price * $item->quantity) }}</div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex items-center justify-center md:justify-end mx-2 mt-8 rounded">
                        <p class="mr-4 py-3 px-6 bg-white rounded-md">{{ sprintf("Totale: %.2f €", $cart_total)}}</p>
                        <a href="{{ route('new-order') }}" class="btn flex px-6 py-3 bg-amber-400 text-gray-700 text-md font-medium rounded-md focus:outline-none">Procedi all'ordine</a>
                    </div>
                @else
                <div class="mt-6 flex items-center justify-center">
                    <p class="text-gray-700 text-2xl font-medium">Il tuo carrello è vuoto</p>
                </div>
                @endif
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
