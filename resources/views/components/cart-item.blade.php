@props(['item'])

<tr class="border-y-2 cart-row">
    <td class="text-center">
        <input type="checkbox" class="w-8 h-8 text-[#F44336] cursor-pointer cart-check-box">
    </td>
    <td class="p-5 m-auto">
        <div class="w-48 h-48 shadow-md">
            <img src="{{ $item->cake->image_src }}" alt="cake" class="w-full h-full object-cover " >
        </div>
    </td>
    <td class="px-5">
        <ol>
            <li>{{ $item->cake->name }}</li><br><br>
            <li>Age: {{ $item->age }}</li>
            <li>Candle: {{ $item->candle_type }}</li>
            <li>Dedication: {{ $item->dedication }}</li>
        </ol>
    </td>
    <td class="text-center">
        {{-- <div class="flex shadow-md cursor-pointer w-fit rounded-md overflow-hidden border m-auto">
            <div class="w-10 h-10 text-[#F44336] bg-white font-mono text-3xl font-bold text-center  hover:text-2xl active:text-3xl select-none" id="minus-quantity">&minus;</div>
            <input class="w-14 h-10 bg-[#EDE7E7] font-bold font-mono text-xl pl-4 text-center inline-block" readonly type="number" id="quantity" name="quantity" value="1" min="1" max="99">
            <div class="w-10 h-10 text-[#F44336] bg-white font-mono text-3xl font-bold text-center  hover:text-2xl active:text-3xl select-none" id="plus-quantity">&plus;</div>
        </div> --}}
        <div class="font-bold text-2xl">
            {{ $item->quantity }}
        </div>
    </td>
    <td class="text-center">
        <div class="text-xl font-bold text-[#F44336]">
            <span class="mr-1 text-2xl">&#8369;</span>
            {{ $item->cake->price }}
        </div>
    </td>
    <td class="text-center">
        <button type="button" class="bg-blue-500 w-10 h-10 rounded-md shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden">
            <svg
                class="w-7 h-7 m-auto"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 384 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#fff" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
            </svg>
        </button>
        <br><br>
        <button type="button" class="bg-red-500 w-10 h-10 rounded-md shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden">
            <svg
                class="w-7 h-7 m-auto"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 384 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#fff" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
            </svg>
        </button>
    </td>
</tr>
