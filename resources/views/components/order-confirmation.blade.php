@props([
    'items',
    'total' => '00.00',
    'address'
])

<div id="confirmation" class="hidden fixed inset-0 bg-black bg-opacity-50 w-full h-screen z-50 overflow-auto py-10">
    {{-- <div class="absolute w-full h-full border-8"></div> --}}
    <div class="w-3/5 overflow-auto bg-gray-50 m-auto  relative shadow-xl shadow-black border-2 rounded-md">
        <div class="bg-[#ffdab9] text-end  px-10 py-2 h-fit sticky inset-0 flex justify-between items-center">
            <div>
                <span class="font-semibold">Order Confirmation</span>
            </div>
            <button id="cancel" class="bg-red-500 hover:bg-[#D22115] aspect-square w-7 rounded-md shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden">
                <svg
                    class="aspect-square w-4 m-auto"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512">
                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#fff" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                </svg>
            </button>
        </div>
        <div class="px-20 py-5">
            <table class="table-fixed w-full">
                @foreach ($items as $item)
                    <tr class="border-y-2">
                        <td class="w-72 p-2">
                            <div class="w-60 h-60 m-auto shadow-md border rounded-sm">
                                <img src="{{ Storage::url($item->cake->image_src) }}" alt="cake" class="w-full h-full object-cover " >
                            </div>
                        </td>
                        <td class="w-auto px-5">
                            <ol>
                                <li>{{ $item->cake->name }} &nbsp;&nbsp; <span class="text-base italic">x{{ $item->quantity }}</span></li>
                                <li class="text-xs text-red-500"> &#8369; {{ number_format($item->cake->price, 2) }}</li>
                                <br>
                                <li>Age: {{ $item->age }}</li>
                                <li>Candle: {{ $item->candle_type }}</li>
                                <li>Dedication: {{ $item->dedication }}</li>
                            </ol>
                        </td>
                    </tr>
                    <input form="form-place-order" type="hidden" name="items[]" value="{{ $item->id }}">
                @endforeach
            </table>
            <br>

            <span class="font-bold">Delivery Date & Time</span>
            <div class="px-10">
                <br>
                <div>Date: <span id="confirm-date">mm/dd/yy</span></div>
                <div>Time: <span id="confirm-time">00:00 AM</span></div>
            </div>
            <br>

            <span class="font-bold">Address</span>
            <div class="px-10">
                <br>
            @if ($address)
                <ul id="confirm-address">
                    <li>
                        <span class="mr-5">{{ $address->name }}</span>
                        <span class="text-gray-400">{{ $address->phone_number }}</span>
                    </li>
                    <li>{{ $address->unit_floor ? $address->unit_floor.', ':"" }}{{ $address->street_building }}</li>
                    <li>{{ Str::title($address->province) }}, {{ Str::title($address->city_municipality) }}, {{ $address->barangay }}</li>
                </ul>
            @else
                <div class="text-red-500 italic"><a href="/user/address">Please add an address. <span>*</span></a></div>
            @endif
            </div>
            <br>

            <span class="font-bold">Payment Method</span>
            <div class="px-10">
                <br>
                <span id="confirm-payment">COD</span>
            </div>
            <br>
            <hr class="border-b-2">
            <br><br>

            @foreach ($items as $item)
                <div class="flex justify-between w-3/4 m-auto">
                    <div class="text-xs text-gray-500">{{ $item->cake->name }} (x{{ $item->quantity }})</div>
                    <div class="text-xs text-gray-500">&#8369; {{ number_format($item->cake->price * $item->quantity, 2) }}</div>
                </div>
            @endforeach
            <br>
            <div class="flex justify-between w-3/4 m-auto">
                <div class="text-xl font-bold">TOTAL</div>
                <div>
                    <div class="text-3xl font-bold">
                        &#8369;
                        <span class="ml-2"> {{ $total }}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="p-3">
            <form action="/user/order" method="POST" id="form-place-order">
                @csrf
                <input type="hidden" name="total" value="{{ str_replace(',', '', $total) }}">
                <x-nav-link :isButton='true' type='submit' class="w-full">
                    CONFIRM ORDER
                </x-nav-link>
            </form>
        </div>
        <br><br>
    </div>
</div>
