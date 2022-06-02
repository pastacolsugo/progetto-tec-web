<x-app-layout>
<div class="max-w-7xl mx-auto bg-white p-8 my-4 rounded border border-gray-200">
    <div>
        <div class="flex lg:hidden">
            <h1 class="font-medium text-3xl">{{ $product->name }}</h1>
        </div>
        <div class="mt-8 grid lg:grid-cols-2 gap-8 gap-x-16">
            <div>
                <img class="max-h-80 object-scale-down" src="{{ route('product-image', ['product_id' => $product->id]) }}" alt="..."/>
            </div>

            <div class="flex flex-col">
                <h1 class="font-medium hidden lg:block text-3xl">{{ $product->name }}</h1>
                <div class="mt-16">
                    @if ($product->stock > 5)
                        <p class="text-sm text-green-700 block mb-1 font-bold">Disponibile</p>
                    @elseif ($product->stock >= 1 and $product->stock <= 5)
                        <p class="text-sm text-orange-700 block mb-1 font-medium">Pochi pezzi rimanenti</p>
                    @else
                        <p class="text-sm text-red-700 block mb-1 font-medium">Esaurito</p>
                    @endif
                    <p class="text-2xl text-gray-700 block mb-1 font-medium">{{ $product->price }} €</p>

                    <form action={{ route('addProductToCart') }} method="POST" class="mt-16">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <select name="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                        </select>
                        <x-amber-button class="m-4">Aggiungi al carrello</x-amber-button>
                    </form>
                </div>
            </div>

            <div>
                <p class="text-sm text-gray-700 block mb-1 font-medium">Category</p>
                <input type="text" name="category" id="category" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="{{ $product->category_id }}" value="{{ $product->category_id }}" />
            </div>

            <div class="col-span-full whitespace-pre-line">
                <p>{{ $product->description }}</p>
            </div>

        </div>

    </div>
</div>
</x-app-layout>
