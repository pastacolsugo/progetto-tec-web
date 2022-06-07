<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>
    <div class="flex flex-col max-w-7xl mx-auto">
        <div class="py-0 align-middle inline-block min-w-full lg:py-2 sm:px-0 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                <div class="flex flex-col lg:flex-row px-4 md:p-4 md:mt-8">
                    <div class="w-full lg:w-1/2 order-2">
                        <div class="flex items-center">
                            <a href="{{ route('new-order') }}" class="button flex text-sm text-gray-700 focus:outline-none"><span class="flex items-center justify-center border-2 border-blue-500 rounded-full h-5 w-5 mr-2">1</span>Spedizione</a>
                            <a class="button flex text-sm text-gray-500 ml-8 focus:outline-none disabled"><span class="flex items-center justify-center border-2 border-gray-500 rounded-full h-5 w-5 mr-2">2</span>Pagamento</a>
                            <a class="button flex text-sm text-gray-500 ml-8 focus:outline-none disabled"><span class="flex items-center justify-center border-2 border-gray-500 rounded-full h-5 w-5 mr-2">3</span>Conferma</a>
                        </div>
                        <div class="mt-8 lg:w-3/4">
                            <div class="mt-6">
                                <h3 class="text-sm text-gray-500 font-medium">Nome</h3>
                                <div class="mt-2 flex">
                                    <label class="block flex-1">{{ auth()->user()->name }}</label>
                                </div>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-sm text-gray-500 font-medium">Email</h3>
                                <div class="mt-2 flex">
                                    <label class="block flex-1">{{ auth()->user()->email }}</label>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('payments') }}" method="POST" class="mt-8 lg:w-3/4">
                            @csrf
                            <div class="mt-8">
                                <h3 class="text-sm text-gray-500 font-medium">Indirizzo di spedizione</h3>
                                <div class="mt-2 flex">
                                    <label for="address" class="hidden" >Address</label>
                                    <div class="block flex-1">
                                        <x-input type="text" name="address" id="address" class="form-input mt-1 block w-full text-gray-700" placeholder="Indirizzo" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-8">
                                <a href="{{ route('cart') }}" class="btn flex items-center text-gray-700 text-sm font-medium rounded hover:underline focus:outline-none">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                                    <span class="mx-2">Carrello</span>
                                </a>
                                <button class="flex items-center px-3 py-3 bg-amber-400 text-gray-700 text-sm font-medium rounded-md focus:outline-none">
                                    <span>Pagamento</span>
                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2 overflow-y-auto">
                        <div class="flex justify-center lg:justify-end">
                            <div class="border rounded-md max-w-md w-full px-4 py-3">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-gray-700 font-medium">Totale ({{ $cart->items }}): </h3>
                                    <h3 class="text-gray-700 text-sm">{{ sprintf("%.2f €", $cart->subtotal) }}</h3>
                                </div>
                                <div class="my-4 grid grid-cols-[2fr_3fr_2fr] gap-y-6 gap-x-4">
                                    @foreach($cart_items as $cart_item)
                                        <div class="h-20 w-20 flex flex-col justify-center">
                                            <img class="max-h-20 max-w-[5rem] object-contain rounded" src="{{ route('product-image', $cart_item->product_id) }}" alt="{{ $cart_item->name }}">
                                        </div>
                                        <div class="flex flex-col justify-around">
                                            <h3 class="text-sm text-gray-600">{{ $cart_item->name }}</h3>
                                            <div class="flex items-center mt-2">
                                                <form action="{{ route('addProductToCart') }}" method="POST">
                                                @csrf
                                                    <x-input type="hidden" name="product_id" value="{{ $cart_item->product_id }}"/>
                                                    <x-input type="hidden" name="quantity" value="1"/>
                                                    <button type="submit" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    </button>
                                                </form>
                                                <span class="text-gray-700 mx-2"> {{ $cart_item->quantity }} </span>
                                                <form action="{{ route('removeProductFromCart') }}" method="POST">
                                                @csrf
                                                    <x-input type="hidden" name="product_id" value="{{ $cart_item->product_id }}"/>
                                                    <x-input type="hidden" name="quantity" value="1"/>
                                                    <button type="submit" class="btn text-gray-500 focus:outline-none focus:text-gray-600">
                                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <span class="text-gray-600 text-right">{{ sprintf("%.2f €", $cart_item->price) }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
