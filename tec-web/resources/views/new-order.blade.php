<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Order') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-6">
        <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>
        <div class="flex flex-col lg:flex-row mt-8">
            <div class="w-full lg:w-1/2 order-2">
                <div class="flex items-center">
                    <button class="flex text-sm text-gray-700 focus:outline-none"><span class="flex items-center justify-center border-2 border-blue-500 rounded-full h-5 w-5 mr-2">1</span>Contacts</button>
                    <button class="flex text-sm text-gray-500 ml-8 focus:outline-none" disabled><span class="flex items-center justify-center border-2 border-gray-500 rounded-full h-5 w-5 mr-2">2</span> Shipping</button>
                    <button class="flex text-sm text-gray-500 ml-8 focus:outline-none" disabled><span class="flex items-center justify-center border-2 border-gray-500 rounded-full h-5 w-5 mr-2">3</span> Payments</button>
                </div>
                <div class="mt-8 lg:w-3/4">
                    <div class="mt-6">
                        <h4 class="text-sm text-gray-500 font-medium">Name</h4>
                        <div class="mt-6 flex">
                            <label class="block flex-1">{{ auth()->user()->name }}</label>
                        </div>
                    </div>
                </div>
                <div class="mt-8 lg:w-3/4">
                    <div class="mt-6">
                        <h4 class="text-sm text-gray-500 font-medium">Email</h4>
                        <div class="mt-6 flex">
                            <label class="block flex-1">{{ auth()->user()->email }}</label>
                        </div>
                    </div>
                </div>
                <!-- TODO Add view for shipping -->
                <form action="" method="POST" class="mt-8 lg:w-3/4">
                    @csrf
                    <div class="mt-8">
                        <h4 class="text-sm text-gray-500 font-medium">Delivery address</h4>
                        <div class="mt-6 flex">
                            <label class="block flex-1">
                                <x-input type="text" name="address" class="form-input mt-1 block w-full text-gray-700" placeholder="Address"/>
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-8">
                        <a href="{{ route('cart') }}" class="btn flex items-center text-gray-700 text-sm font-medium rounded hover:underline focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                            <span class="mx-2">Back step</span>
                        </a>
                        <button class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Shipping</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </div>
                </form>
                </div>
                <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">
                    <div class="flex justify-center lg:justify-end">
                        <div class="border rounded-md max-w-md w-full px-4 py-3">
                            <div class="flex items-center justify-between">
                                <h3 class="text-gray-700 font-medium">Order total ({{ $cart->items }}): </h3>
                                <h3 class="text-gray-700 text-sm">{{ $cart->subtotal }}$</span>
                            </div>
                            @foreach($cart_items as $cart_item)
                                <div class="flex justify-between mt-6">
                                    <div class="flex">
                                        <img class="h-20 w-20 object-cover rounded" src="{{ $cart_item->image }}" alt="{{ $cart_item->name }}">
                                        <div class="mx-3">
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
                                    </div>
                                    <span class="text-gray-600">{{ $cart_item->price }}$</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>