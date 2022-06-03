<x-app-layout>
    <div class="max-w-7xl mx-auto">
    <div class="my-0 overflow-x-auto md:mx-0 xl:mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-0 lg:p-8 lg:pt-4">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="grid grid-rows-2 grid-cols-2 md:grid-cols-4 gap-3 m-6 justify-evenly">
                @for ($i = 0; $i < 8; $i++)
                    <x-product-card>
                        <x-slot name="id">{{ $products[$i]->id }}</x-slot>
                        <x-slot name="price">{{ $products[$i]->price }}€</x-slot>
                        <x-slot name="name">{{ $products[$i]->name }}</x-slot>
                    </x-product-card>
                @endfor
                <div class="col-span-full my-4 py-2 shadow-lg bg-gray-600 text-gray-100 text-center">SCONTONI su <b>Localhost!</b></div>
                @for ($i = 8; $i < 16; $i++)
                    <x-product-card>
                        <x-slot name="id">{{ $products[$i]->id }}</x-slot>
                        <x-slot name="price">{{ $products[$i]->price }}€</x-slot>
                        <x-slot name="name">{{ $products[$i]->name }}</x-slot>
                    </x-product-card>
                @endfor
                <div class="col-span-full my-4 py-2 shadow-lg bg-gray-600 text-gray-100 text-center">SCONTONI su <b>Localhost!</b></div>
                @for ($i = 16; $i < 24; $i++)
                    <x-product-card>
                        <x-slot name="id">{{ $products[$i]->id }}</x-slot>
                        <x-slot name="price">{{ $products[$i]->price }}€</x-slot>
                        <x-slot name="name">{{ $products[$i]->name }}</x-slot>
                    </x-product-card>
                @endfor
            </div>
        </div>
        </div>
    </div>
    </div>
</x-app-layout>
