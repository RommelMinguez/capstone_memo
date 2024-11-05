@props([
    'item',
    'order',
    'toReview' => false])

@php
    $bgStatus = [
        'pending' => 'bg-yellow-500',
        'baking' => 'bg-orange-500',
        'ready' => 'bg-green-500',
        'completed' => 'bg-blue-500',
        'canceled' => 'bg-red-500',
    ]
@endphp

{{-- <tr {{ $attributes->merge(['class' => 'border-y-2'])}}> --}}
<tr class="border-y-2 hover:bg-[#fdf2d8] cursor-pointer" onclick="showDetails({{ json_encode($order->toArray()) }})">
    <td class="w-20 p-2 font-bold text-center">
        {{ $order->id }}
    </td>
    <td class="w-52 p-2">
        <div class="w-40 h-40 m-auto shadow-md border rounded-sm">
            <a href="/cakes/{{ $item->cake->id }}"><img src="{{ Storage::url($item->cake->image_src) }}" alt="cake" class="w-full h-full object-cover " ></a>
        </div>
    </td>
    <td class="w-auto px-3">
        <ol>
            <li>
                <span class="hover:underline  text-xl"><a href="/cakes/{{ $item->cake->id }}" class="font-bold">{{ $item->cake->name }}</a></span>
                &nbsp;&nbsp;
                <span class="italic">x{{ $item->quantity }}</span>
            </li>
            <li class="text-xs text-red-500">
                &#8369;
                <span class="ml-2">{{ number_format($item->cake->price, 2) }}</span>
            </li>
            <br>
            <li>
                Age: <span>{{ $item->age }}</span>
            </li>
            <li>
                Candle: <span>{{ $item->candle_type }}</span>
            </li>
            <li>
                Dedication: <span>{{ $item->dedication }}</span>
            </li>
        </ol>
    </td>
    {{-- <td class="w-auto px-3">
        <dl>
            <dt>Date</dt>
            <dd>{{ $item->order->prefered_date }}</dd>

            <dt>Address</dt>
            <dd>{{ $item->order->address->name }} <span>{{ $item->order->address->phone_number }}</span></dd>
            <dd>{{ $item->order->address->street_building }}, {{ $item->order->address->unit_floor }}</dd>
            <dd>{{ $item->order->address->province }}, {{ $item->order->address->city_municipality }}, {{ $item->order->address->barangay }}</dd>
        </dl>
    </td> --}}
    <td class="w-40 h-40">
        <div class="w-full h-full flex flex-col justify-between items-center py-2">
            <div class="flex text-xs">
                <div class="py-1 px-2 bg-[#D9D9D9] border border-r-0 border-gray-500 rounded-l-md">STATUS</div>
                <div class="py-1 px-2 border border-gray-500 rounded-r-md text-white {{ $bgStatus[$order->status] }}" >{{ Str::upper($order->status) }}</div>
            </div>
            <div class="text-xl font-bold text-[#F44336]">
                &#8369;
                <span class="ml-2">{{ number_format($item->sub_total, 2) }}</span>
            </div>
            <div></div>
        </div>
    </td>
    {{-- <td class="w-40 text-center p-5 text-xs">
        <div class="flex flex-col justify-center gap-3">
            <button type="button" class="bg-red-500 py-1 px-3 text-white shadow-md rounded-lg border hover:bg-red-600 active:scale-95 {{ $item->status == 'pending' ? '':'hidden'}}">
                CANCEL
            </button>
            <button type="button" class="bg-blue-500 py-1 px-3 text-white shadow-md rounded-lg border hover:bg-blue-600 active:scale-95">
                DETAILS
            </button>
            <button type="button" class="bg-green-500 py-1 px-3 text-white shadow-md rounded-lg border hover:bg-green-600 active:scale-95 {{ $toReview ? '':'hidden' }}">
                REVIEW
            </button>
        </div>
    </td> --}}
</tr>
