@props(['item', 'toReview' => false])

@php
    $statusColor = [
        'new' => 'text-yellow-600',
        'approved' => 'text-yellow-600',
        'pending' => 'text-yellow-500',
        'baking' => 'text-orange-500',
        'ready' => 'text-green-500',
        'completed' => 'text-blue-500',
        'canceled' => 'text-red-500',
        'rejected' => 'text-red-500',
    ]
@endphp

{{-- <tr {{ $attributes->merge(['class' => 'border-y-2'])}}> --}}
<tr class="border-y-2 hover:bg-[#fdf2d8] cursor-pointer max-h-52 overflow-hidden" onclick="showDetails({{ json_encode($item->toArray()) }})">
    <td class="w-20 p-2 font-bold text-center">
        {{ $item->id }}
    </td>
    <td class="w-52 p-2">
        <div class="w-40 h-40 m-auto shadow-md border rounded-sm">
            <img src="{{ Storage::url($item->image_src) }}" alt="cake" class="w-full h-full object-cover " >
        </div>
    </td>
    <td class="w-auto px-3">
        <ol>
            <li>
                <span class="hover:underline  text-lg">{{ $item->cake_name }}</span>
            </li>
            <br>
            <li class="pr-10 max-h-20 text-sm overflow-hidden">
               {{ $item->description }}
            </li>
            <br>
            <li class="gap-2 flex pr-10 overflow-hidden py-1">
                @foreach ($item->tags as $tag)
                    <x-cake-tag :tagId="$tag->id" tagName="attached-tag-{{ $item->id }}" :checked="true">{{ $tag->name }}</x-cake-tag>
                @endforeach
            </li>
        </ol>
    </td>

    <td class="w-40 h-40">
        <div class="w-full h-full flex flex-col justify-between items-center py-2">
            <div class="font-semibold {{ $statusColor[$item->status] }}">
                {{ Str::upper($item->status) }}
            </div>
            <div class="text-xl font-bold text-[#F44336]">
                @if ($item->given_price)
                    &#8369;
                    <span class="ml-2">{{ number_format($item->given_price, 2) }}</span>
                @else
                    <span class="ml-2 text-base">Not Set</span>
                @endif
            </div>
            <div></div>
        </div>
    </td>
</tr>
