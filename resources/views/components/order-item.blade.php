@props(['item'])

<tr class="border-t-2">
    <td class="w-52 p-2">
        <div class="w-40 h-40 m-auto shadow-md border rounded-sm">
            <img src="{{ $item->cake->image_src }}" alt="cake" class="w-full h-full object-cover " >
        </div>
    </td>
    <td class="w-auto px-5">
        <ol>
            <li><span class="hover:underline font-localLobster">{{ $item->cake->name }}</span>  <span class="italic">x{{ $item->quantity }}</span></li><br><br>
            <li>Age: {{ $item->age }}</li>
            <li>Candle: {{ $item->candle_type }}</li>
            <li>Dedication: {{ $item->dedication }}</li>
        </ol>
    </td>
    <td class="w-40 text-center">
        <div class="text-xl font-bold text-[#F44336]">
            &#8369;
            <span class="ml-2">{{ number_format( $item->quantity * $item->cake->price, 2) }}</span>

        </div>
    </td>
</tr>


{{-- MOBILE VIEW --}}
{{-- <tr class="border-t-2">

    <td class="w-32 p-2">
        <div class="w-24 h-24 m-auto shadow-md border rounded-sm">
            <img src="/images/cakes/memo-cake (1).jpg" alt="cake" class="w-full h-full object-cover " >
        </div>
    </td>
    <td class="w-auto">
        <ol class="text-md">
            <li>Name:</li><br>
            <li>Age:</li>
            <li>Candle:</li>
            <li>Dedication:</li>
        </ol>
    </td>
    <td class="w-20 text-center">
        <div class="text-lg font-bold text-[#F44336]">
            &#8369;
            <span class="ml-1">00.00</span>

        </div>
    </td>
</tr> --}}
