<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>   
    @if($notifications)
        @if($notifications->count() > 0)
            @foreach($notifications as $notification)
            <div class="bg-blue-600">
                <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between flex-wrap">
                        <div class="w-0 flex-1 flex items-center">
                            <span class="flex p-2 rounded-lg bg-blue-800">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                            </span>
                            <p class="ml-3 font-medium text-white truncate">
                                @if($notification->type == "App\Notifications\SoldOut")
                                <span class="md:inline"> [ {{$notification->created_at}} ] product {{$notification->data['name']}} is sold out </span>
                                @endif
                            </p>
                        </div>
                        <div class="order-3 mt-2 flex  sm:order-2 sm:mt-0 sm:w-auto">
                            <a href="{{ route('markNotification', $notification->id) }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-blue-600 bg-white hover:bg-blue-50"> Mark as read </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="order-3 mt-2 flex-shrink-0 sm:order-2 sm:mt-0 sm:w-auto">
                <a href="{{ route('markNotification', $notification = "mark-all") }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-blue-600 bg-white hover:bg-blue-50"> Mark all as read </a>
            </div>
            @else
            <div class="mt-6 flex items-center justify-center">
                <p class="text-gray-700 text-2xl font-medium">There are no new notifications</p>
            </div>
        @endif
    @endif
</x-app-layout>


