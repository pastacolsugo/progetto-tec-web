<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4 gap-x-8 lg:gap-8 lg:gap-x-16 jusify-between p-6 bg-white border-b border-gray-200">
                    {{-- TODO: Localize strings! --}}
                    @if ($isSeller)
                      {{-- <a href="{{ route('sellerListing') }}" class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex justify-center items-center">Listino</a> --}}
                      <x-dashboard-button href="{{ route('sellerListing') }}">I miei annunci</x-dashboard-button>
                    @endif
                    {{-- TODO: Add links and replace placeholder buttons --}}
                    <x-dashboard-button href="#">Ordini</x-dashboard-button>
                    <x-dashboard-button href="#">I miei dati</x-dashboard-button>
                    <x-dashboard-button href="#">Banane</x-dashboard-button>
                    <x-dashboard-button href="#">Placeholder #123</x-dashboard-button>
                    <x-dashboard-button href="#">Link?</x-dashboard-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
