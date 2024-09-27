@props(['item'])

<tr {{ $attributes->merge(['class' => 'border-y-2'])}}>
    <td class="w-72 p-2">
        <div class="w-60 h-60 m-auto shadow-md border rounded-sm">
            <a href="/cakes/{{ $item->cake->id }}"><img src="{{ $item->cake->image_src }}" alt="cake" class="w-full h-full object-cover " ></a>
        </div>
    </td>
    <td class="w-auto px-3">
        <ol>
            <li>
                <span class="hover:underline  text-xl"><a href="/cakes/{{ $item->cake->id }}" class="font-bold">{{ $item->cake->name }}</a></span>
                &nbsp;&nbsp;
                <span class="italic">x{{ $item->quantity }}</span>
            </li><br>
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
    <td class="w-40 h-60">
        <div class="w-full h-full flex flex-col justify-between items-center py-2">
            <div class="flex text-xs">
                <div class="py-1 px-2 bg-[#D9D9D9] border border-r-0 border-gray-500 rounded-l-md">STATUS</div>
                <div class="py-1 px-2 bg-[#D9D9D9] border border-gray-500 rounded-r-md">{{ $item->status }}</div>
            </div>
            <div class="text-xl font-bold text-[#F44336]">
                &#8369;
                <span class="ml-2">{{ $item->sub_total }}</span>
            </div>
            <div></div>
        </div>
    </td>
</tr>
