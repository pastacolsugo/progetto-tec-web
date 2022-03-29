<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>   
    @if($notifications)
        @if($notifications->count() > 0)
            <div class="order-1 mt-2 flex-shrink-0 sm:mt-0">
                <a href="{{ route('markNotification', $notification = "mark-all") }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-blue-600 bg-white hover:bg-blue-50"> Mark all as read </a>
            </div>
            @foreach($notifications as $notification)
            <div class="bg-blue-600">
                <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between flex-wrap">
                        <div class="w-0 flex-1 flex items-center">
                            <span class="flex p-2 rounded-lg bg-blue-800"></span>
                            <p class="ml-3 font-medium text-white truncate">
                                @if($notification->type == "App\Notifications\SoldOut")
                                    <span class="md:inline"> {{$notification->data['name']}} is sold out [ {{$notification->created_at}} ]  </span>
                                @endif
                                @if($notification->type == "App\Notifications\NewOrderShipped")
                                    <span class="md:inline"> Order #{{$notification->data['name']}} has been shipped [ {{$notification->created_at}} ] </span>
                                @endif
                            </p>
                        </div>
                        <div class="order-2 ml-3 mt-2 flex sm:mt-0 sm:w-auto">
                            <a href="{{ route('markNotification', $notification->id) }}" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-blue-600 bg-white hover:bg-blue-50"> Mark as read </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="mt-6 flex items-center justify-center">
                <p class="text-gray-700 text-2xl font-medium">There are no new notifications</p>
            </div>
        @endif
    @endif
</x-app-layout>


