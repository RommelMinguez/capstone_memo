@props(['item'])

<tr class="border-t-2">
    <td class="w-52 p-2">
        <div class="w-40 h-40 m-auto shadow-md border rounded-sm">
            <a href="/cakes/{{ $item->cake->id }}"><img src="{{ $item->cake->image_src }}" alt="cake" class="w-full h-full object-cover " ></a>
        </div>
    </td>
    <td class="w-auto px-5">
        <ol>
            <li>
                <span class="hover:underline  text-xl"><a href="/cakes/{{ $item->cake->id }}" class="font-bold">{{ $item->cake->name }}</a></span>
                &nbsp;&nbsp;
                <span class="italic">x{{ $item->quantity }}</span>
            </li><br>
            <li>Age: <i>{{ $item->age }}</i></li>
            <li>Candle: <i>{{ $item->candle_type }}</i></li>
            <li>Dedication: <i>{{ $item->dedication }}</i></li>
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
