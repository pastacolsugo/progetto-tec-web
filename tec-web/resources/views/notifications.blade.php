<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifiche') }}
        </h2>
    </x-slot>
    <div class="my-0 md:mx-0 xl:mx-8">
        <div class="py-0 align-middle inline-block min-w-full lg:py-2 sm:px-0 lg:px-8">
            @if($notifications)
                @if($notifications->count() > 0)
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                    <div class="order-1 mt-2 flex-shrink-0 sm:mt-0">
                        <a href="{{ route('markNotification', $notification = "mark-all") }}" class="flex items-center justify-center px-4 py-2 shadow-sm text-sm font-medium text-gray-700 bg-amber-400"> Segna tutti come letto </a>
                    </div>
                    @foreach($notifications as $notification)
                    <div class="bg-white">
                        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between flex-wrap">
                                <div class="flex items-center">
                                    <p class="ml-3 font-medium text-gray-700">
                                    @if($notification->type == "App\Notifications\SoldOut")
                                        <span class="md:inline"> Il prodotto {{$notification->data['name']}} è esaurito [ {{$notification->created_at}} ] </span>
                                    @endif
                                    @if($notification->type == "App\Notifications\NewOrderShipped")
                                        <span class="md:inline"> Il prodotto {{ $notification->data['name'] }} è stato spedito. Numero ordine #0000{{ $notification->data['order_number'] }} [ {{ $notification->created_at }} ] </span>
                                    @endif
                                    </p>
                                </div>
                                <div class="order-2 ml-3 mt-2 flex sm:mt-0 sm:w-auto">
                                    <a href="{{ route('markNotification', $notification->id) }}" class="flex items-center justify-center px-2 py-1 rounded text-sm font-medium text-gray-700 bg-amber-400"> Segna come letto </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                    <div class="mt-6 flex items-center justify-center">
                        <p class="text-gray-700 text-2xl font-medium">Nessuna nuova notifica</p>
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>


