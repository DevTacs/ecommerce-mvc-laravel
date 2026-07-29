<tbody class="divide-y divide-gray-100">
    @forelse ($orderItems as $item)
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 flex flex-row">
                <p class="px-4 w-10">{{$loop->iteration}}.</p>
                <img class="w-15 ml-4" src="{{asset($item->image_url)}}" alt="{{$item->product_name}}" loading="lazy">
            </td>
            
            <td class="px-6 py-4 font-medium">
                {{ $item->product_name }}
            </td>

            <td class="px-6 py-4 text-right">
                ₱{{ number_format($item->product_price, 2) }}
            </td>

            <td class="px-6 py-4 text-center">
                {{ $item->quantity }}
            </td>

            <td class="px-6 py-4 text-right font-semibold">
                ₱{{ number_format($item->product_price * $item->quantity, 2) }}
            </td>
        </tr>
    @empty
    @include('pages.orders.customer.show._empty_state')
    @endforelse
</tbody>