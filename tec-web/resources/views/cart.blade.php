<x-app-layout>
    @foreach ($cart_items as $item)
        <p>{{ $item->name }}</p>
        <p>{{ $item->price }}</p>
        <!-- TODO #a11y: alt text -->
        <img src={{ $item->image }} alt=...>
    @endforeach
</x-app-layout>
