<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($isSeller)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-4 md:gap-x-8 lg:gap-8 lg:gap-x-16 jusify-between p-6 pb-0 lg:pb-2 bg-white">
                        <x-dashboard-button href="{{ route('sellerListing') }}">I miei annunci</x-dashboard-button>
                        <x-dashboard-button href="{{ route('createProduct') }}">Crea nuovo annuncio</x-dashboard-button>
                        <x-dashboard-button href="{{ route('seller-orders-listing') }}">Ordini clienti</x-dashboard-button>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-x-12 lg:gap-8 lg:gap-x-16 jusify-between p-6 bg-white border-b border-gray-200">
                    <x-dashboard-button href="{{ route('notifications') }}">
                        <span class="mr-2 items-center justify-center">Notifiche</span>
                        @if(auth()->user()->unreadNotifications)
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ auth()->user()->unreadNotifications->count() }}</span>
                            @endif
                        @endif
                    </x-dashboard-button>
                    <x-dashboard-button href="{{ route('cart') }}">Carrello</x-dashboard-button>
                    <x-dashboard-button href="{{ route('my-orders') }}">Ordini</x-dashboard-button>
                    <x-dashboard-button href="{{ route('profile-edit') }}">I miei dati</x-dashboard-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
