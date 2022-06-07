<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conferma Ordine') }}
        </h2>
    </x-slot>
    <div class="my-0 md:mx-0 xl:mx-8">
        <div class="py-0 align-middle inline-block min-w-full lg:py-2 sm:px-0 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                <div class="flex flex-col lg:flex-row m-4 mt-0 md:mt-8">
                    <div class="w-full lg:w-1/2 order-2">
                        <div class="flex justify-around md:justify-start items-center">
                            <a class="button flex text-sm text-blue-500 focus:outline-none disabled"><span class="flex items-center justify-center text-white bg-blue-500 rounded-full h-5 w-5 mr-2">1</span>Spedizione</a>
                            <a class="button flex text-sm ml-0 md:ml-8 text-blue-500 focus:outline-none disabled"><span class="flex items-center justify-center text-white bg-blue-500 rounded-full h-5 w-5 mr-2">2</span>Pagamento</a>
                            <a href="{{ route('confirmOrder') }}" class="button flex text-sm ml-0 md:ml-8 text-gray-700 focus:outline-none"><span class="flex items-center justify-center border-2 border-blue-500 rounded-full h-5 w-5 mr-2">3</span>Conferma</a>
                        </div>
                        <form action="{{ route('placeOrder') }}" method="POST">
                            @csrf
                            <div class="mt-8 lg:w-3/4 rounded-md max-w-md w-full px-4 py-3">
                                <h3 class="text-sm text-gray-500 font-medium">Spedire a:</h3>
                                <div class="mt-2">
                                    <div class="mt-2 flex">
                                        <label class="block flex-1">{{ auth()->user()->name }}</label>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="mt-2 flex">
                                    <x-input type="hidden" name="address" value="{{ request()->address }}"/>
                                        <label class="block flex-1">{{ request()->address }}</label>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h3 class="text-sm text-gray-500 font-medium">Contatti:</h3>
                                    <div class="mt-2 flex">
                                    <label class="block flex-1">{{ auth()->user()->email }}</label>
                                    </div>
                                </div>
                                <div class="mt-6" >
                                    <h3 class="text-sm text-gray-500 font-medium">Metodo di pagamento:</h3>
                                    <div class="mt-2">
                                        <div class="mt-2 flex">
                                            <label class="block flex-1">termina con {{ substr(request()->card_number, -4) }}, scadenza: {{ request()->expiration_month }}/{{ substr(request()->expiration_year,-2) }}</label>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="transform translate-x-3/4 -translate-y-1/2 text-black peer-placeholder-shown:text-gray-300 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-8">
                                <button class="flex items-center px-3 py-3 bg-amber-400 text-gray-700 text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <span>Ordina ora</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">
                        <div class="flex justify-center lg:justify-end">
                            <div class="border rounded-md max-w-md w-full px-4 py-3">
                            <div class="flex items-center justify-between">
                                    <h3 class="text-gray-700 font-medium">Totale ({{ $cart->items }}): </h3>
                                    <h3 class="text-gray-700 text-sm">{{ $cart->subtotal }} €</h3>
                                </div>
                                @foreach($cart_items as $cart_item)
                                    <div class="flex justify-between mt-6">
                                        <div class="flex">
                                            <img class="h-20 w-20 object-cover rounded" src="{{ route('product-image', $cart_item->product_id) }}" alt="{{ $cart_item->name }}">
                                            <div class="mx-3">
                                                <h3 class="text-sm text-gray-600">{{ $cart_item->name }}</h3>
                                                <div class="flex items-center mt-2">
                                                    <span class="text-gray-700 mx-2"> {{ $cart_item->quantity }} </span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-gray-600">{{ $cart_item->price }} €</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
