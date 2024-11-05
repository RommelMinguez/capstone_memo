<x-layout>

    <x-header></x-header>

    <main class="w-full">
        <div class="bg-[#F8EBEB] p-20 w-full">
            <h2 class="text-xl font-bold my-10">Order Summary</h2>

            <table class="table-fixed border-collapse w-3/4  m-auto ">
                <tr class="border-t-2">
                    <td class="w-52 p-2">
                        <div class="w-40 h-40 m-auto shadow-md border rounded-sm">
                            <img src="{{ Storage::url($item->image_src) }}" alt="cake" class="w-full h-full object-cover " >
                        </div>
                    </td>
                    <td class="w-auto px-5">
                        <ol>
                            <li>
                                <span class="hover:underline  text-xl">{{ $item->cake_name }}</span>
                                &nbsp;&nbsp;
                                <span class="italic">x{{ $item->quantity }}</span>
                            </li>
                            <br>
                            <li>Age: <i>{{ $item->age }}</i></li>
                            <li>Candle: <i>{{ $item->candle_type }}</i></li>
                            <li>Dedication: <i>{{ $item->dedication }}</i></li>
                        </ol>
                    </td>
                    <td class="w-40 text-center">
                        <div class="text-xl font-bold text-[#F44336]">
                            &#8369;
                            <span class="ml-2">{{ number_format( $item->budget, 2) }}</span>
                        </div>
                    </td>
                </tr>

            </table>

            <br><hr class="border-b-2"><br><br>

            <div class="flex justify-between w-3/4 m-auto">
                <div class="text-xl font-bold">TOTAL</div>
                <div>
                    <div class="text-3xl font-bold">
                        &#8369;
                        <span class="ml-2"> {{ $item->budget }} </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full bg-white px-20 py-5">


            {{--========================================================
            PAYMENT METHODS
            =========================================================--}}
            <div class="font-bold text-2xl">Payment Method <span class="text-red-500 italic">*</span></div>
            <br>
            <div class="w-3/4 m-auto flex gap-5">
                <div class="inp_payment cursor-pointer border-2 border-black text-center w-32 font-semibold py-2 hover:bg-[#F44336] hover:text-white active:scale-95">
                    <div class="text-xs italic font-light">cash on</div>
                    <div>DELIVERY</div>
                </div>
                <div class="inp_payment cursor-pointer border-2 border-black text-center w-32 font-semibold py-2 hover:bg-[#F44336] hover:text-white active:scale-95 ">
                    <div class="text-xs italic font-light">cash on</div>
                    <div>PICK UP</div>
                </div>
            </div>
            <input form="form-place-order" type="hidden" name="payment_method" id="payment_method" value="PICK UP">
            <br><br>
            <hr class="border-b-2">
            <br><br>


            {{--========================================================
            DELIVERY ADDRESS
            =========================================================--}}
            @php
                $address = Auth::user()->mainAddress;
            @endphp

            <div id="delivery_address_container">
                <div class="font-bold text-2xl">Delivery Address <span class="text-red-500 italic">*</span></div>
                @if ($address)
                    <input form="form-place-order"  id="address-inp" type="hidden" name="address_id" value="{{ $address->id }}">
                    <div class="w-3/4 m-auto">
                        <div class="flex justify-between py-5">
                            <div class="flex justify-start gap-5 items-center">
                                <div>
                                    <svg
                                        class="w-12 fill-red-600"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512">
                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                                    </svg>
                                </div>
                                <div>
                                    <ul id="display-address">
                                        <li>
                                            <span class="font-bold mr-5">{{ $address->name }}</span>
                                            <span class="text-gray-400 font-semibold">{{ $address->phone_number }}</span>
                                        </li>
                                        <li>{{ $address->unit_floor ? $address->unit_floor.', ':"" }}{{ $address->street_building }}</li>
                                        <li>{{ Str::title($address->province) }}, {{ Str::title($address->city_municipality) }}, {{ $address->barangay }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div id="change-address" class="underline cursor-pointer ">
                                Change Address
                            </div>

                        <x-address-change></x-address-change>

                        </div>
                    </div>
                @else
                    <div class="w-3/4 m-auto">
                        <a href="/user/address" class="inline-block px-20 py-5 my-5 rounded-lg hover:underline text-red-500 font-bold border-2 border-red-500 border-dashed">
                            + Add Address
                        </a>
                    </div>
                @endif
                <br><br>
                <hr class="border-b-2">
                <br><br>
            </div>

            {{--========================================================
            SCHEDULE DELIVERY
            =========================================================--}}
            <div class="font-bold text-2xl">
                Schedule <span class="span-label">Delivery</span>
            </div>
            <div class="p-10">
                <div class="font-semibold">
                    SELECT <span class="span-label">DELIVERY</span> DATE
                    <span class="text-red-500 italic">*</span>
                </div>
                <br>
                <div class="flex justify-center gap-5 flex-wrap">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="inp_date cursor-pointer border-2 border-black text-xs px-5 py-2 hover:bg-[#F44336] hover:text-white active:scale-95">
                            <div class="text-center font-semibold">date</div>
                            <div>date</div>
                        </div>
                    @endfor
                </div>
                <br>
                <div class="w-3/4 m-auto">
                    <input data-isAdmin="{{ Auth::user()->is_admin }}" form="form-place-order" required type="date" id="delivery_date" name="delivery_date" class="block w-full px-3 py-2 bg-[#EDE7E7] border border-gray-300 text-[#F44336] font-semibold rounded-md shadow-sm cursor-pointer">
                </div>
                <br>
                <hr class="border-b">
                <br>

                <div class="font-semibold">SELECT <span class="span-label">DELIVERY</span> TIME <span class="text-red-500 italic">*</span></div>
                <br>
                <div class="flex justify-center gap-5 flex-wrap">
                    @for($i = 0, $t = 7; $i < 10; $i++)
                        <div class="inp_time cursor-pointer border-2 border-black text-center min-w-20 px-5 py-2 text-xs hover:bg-[#F44336] hover:text-white active:scale-95">
                            <div>{{ $t++ < 12 ? $t : $t - 12 }}:00</div>
                            <div>{{ $t < 12 ? 'AM':'PM'  }}</div>
                        </div>
                    @endfor
                </div>
                <br>
                <div class="w-3/4 m-auto">
                    <input form="form-place-order" required type="time" id="delivery_time" name="delivery_time" min="6:00" max="18:00" class="block w-full px-3 py-2 border bg-[#EDE7E7]  border-gray-300 text-[#F44336] font-semibold rounded-md shadow-sm cursor-pointer">
                </div>
                <br>
            </div>


            <hr class="border-b-2">
            <br>

            <div class="flex justify-between items-center my-10">
                <a href="/user/cart" class="hover:underline">&lt; return to cart</a>
                <x-nav-link type='button' :isButton='true' class="px-40" id="order">
                    PLACE ORDER
                </x-nav-link>
            </div>
            <br><br><br>

        </div>
    </main>


    {{-- <x-order-confirmation :items="$item" total="{{ $item->budget }}" :address="$address"></x-order-confirmation> --}}



    <x-footer></x-footer>


    @include('cakes.order-confirmation');

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-response-failed>{{ $error }}</x-response-failed>
        @endforeach
    @endif

    @session('success')
        <x-response-success>{{ session('success') }}</x-response-success>
    @endsession

    <script src="/js/order.js" defer></script>
</x-layout>


