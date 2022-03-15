{{-- <x-app-layout>
    <div class="max-w-7xl mx-auto bg-white p-8 my-4 rounded border border-gray-200">
    </div>
</x-app-layout> --}}

<x-app-layout>
    <div class="flex-col max-w-7xl mx-auto">
    <div class="my-0 overflow-x-auto md:mx-0 xl:mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-0 lg:p-8">
        <div class="flex-col justify-end shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg">
            <div class="grid grid-rows-2 grid-cols-2 md:grid-cols-4 gap-8 m-6 justify-evenly">
                <x-home-product-card>
                    <x-slot name="src">/product-image/1</x-slot>
                    <x-slot name="price">12.99 €</x-slot>
                    <x-slot name="name">Prodotto ABC</x-slot>
                </x-home-product-card>
                <x-home-product-card>
                    <x-slot name="src">/product-image/1</x-slot>
                    <x-slot name="price">12.99 €</x-slot>
                    <x-slot name="name">Prodotto ABC</x-slot>
                </x-home-product-card>
                <x-home-product-card>
                    <x-slot name="src">/product-image/1</x-slot>
                    <x-slot name="price">12.99 €</x-slot>
                    <x-slot name="name">Prodotto ABC</x-slot>
                </x-home-product-card>
                <x-home-product-card>
                    <x-slot name="src">/product-image/1</x-slot>
                    <x-slot name="price">12.99 €</x-slot>
                    <x-slot name="name">Prodotto ABC</x-slot>
                </x-home-product-card>
            </div>
        </div>
        </div>
    </div>
    </div>
</x-app-layout>
