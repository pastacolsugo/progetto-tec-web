<tr>
    <td class="px-6 py-4">
    <div class="flex-shrink-0 h-20 w-20 hidden md:block">
        <img class="h-20 w-20-full" src="{{ $image }}" alt="">
    </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-base text-gray-900">{{ $name}}</div>
        <div class="text-sm text-gray-500">{{ $model ?? '' }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-base font-medium text-gray-500">#{{ $id }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $price }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $stock }}</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span @class([
            'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
            'bg-green-100 text-green-800' => $status == "Active",
            'bg-gray-100 text-gray-800' => $status == "Hidden",
            'bg-red-100 text-red-800' => $status == "Sold out",
            'bg-orange-100 text-orange-800' => $status == "Backordered",
            ])>{{ $status }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
    </td>
</tr>
