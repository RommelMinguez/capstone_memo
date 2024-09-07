<x-layout>

    <x-header></x-header>

    <main class="w-full">
        <div class="bg-[#F8EBEB] p-20 w-full">
            <h2 class="text-xl font-bold my-10">Order Summary</h2>

            <table class="table-fixed border-collapse w-3/4  m-auto ">
                @for($i = 0; $i < 2; $i++)
                    <x-order-item></x-order-item>
                @endfor
            </table>

            <br><hr class="border-b-2"><br><br>

            <div class="flex justify-between w-3/4 m-auto">
                <div class="text-xl font-bold">TOTAL</div>
                <div>
                    <div class="text-3xl font-bold">
                        &#8369;
                        <span class="ml-2"> 00.00 </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full bg-white px-20 py-5">
            <div class="font-bold text-2xl">
                Schedule Delivery
            </div>
            <div class="p-10">
                <div class="font-semibold">
                    SELECT DELIVERY DATE
                </div>
                <br>
                <div class="flex justify-center gap-5">
                    <div class="border-2 border-black px-10 py-2">date <br> date</div>
                    <div class="border-2 border-black px-10 py-2">date <br> date</div>
                    <div class="border-2 border-black px-10 py-2">date <br> date</div>
                    <div class="border-2 border-black px-10 py-2">date <br> date</div>
                    <div class="border-2 border-black px-10 py-2">date <br> date</div>
                    <div class="border-2 border-black px-10 py-2">date <br> date</div>
                    <div class="border-2 border-black px-10 py-2">date <br> date</div>
                </div>
                <br>
                <div class="w-3/4 m-auto">
                    <input type="date" id="delivery_date" name="delivery_date" class="block w-full px-3 py-2 bg-[#EDE7E7] border border-gray-300 rounded-md shadow-sm">
                </div>
                <br>
                <hr class="border-b-2">
                <br>

                <div class="font-semibold">SELECT DELIVERY TIME</div>
                <br>
                <div class="flex justify-center gap-5">
                    <div class="border-2 border-black text-center w-40 py-2">7:00 AM</div>
                    <div class="border-2 border-black text-center w-40 py-2">8:00 AM</div>
                    <div class="border-2 border-black text-center w-40 py-2">9:00 AM</div>
                    <div class="border-2 border-black text-center w-40 py-2">10:00 AM</div>
                    <div class="border-2 border-black text-center w-40 py-2">11:00 AM</div>
                </div>
                <br>
                <div class="flex justify-center gap-5">
                    <div class="border-2 border-black text-center w-40 py-2">1:00 PM</div>
                    <div class="border-2 border-black text-center w-40 py-2">2:00 PM</div>
                    <div class="border-2 border-black text-center w-40 py-2">3:00 PM</div>
                    <div class="border-2 border-black text-center w-40 py-2">4:00 PM</div>
                    <div class="border-2 border-black text-center w-40 py-2">5:00 PM</div>
                </div>
                <br>
                <div class="w-3/4 m-auto">
                    <input type="time" id="delivery_time" name="delivery_time" min="6:00" max="18:00" class="block w-full px-3 py-2 border bg-[#EDE7E7]  border-gray-300 rounded-md shadow-sm">
                </div>
                <br>
                <hr class="border-b-2">
                <br>

                <div class="font-semibold">SELECT DELIVERY ADDRESS</div>
                <div class="w-3/4 m-auto">
                    <div class="text-end underline">
                        change address
                    </div>
                    <div>
                        ZONE 6  Barangay Poblacion,  Malibtog, Bukidnon
                    </div>
                    <div>
                        Contact Number: 09123456789
                    </div>
                </div>
                <br>
                <hr class="border-b-2">
            </div>

            {{-- <br>
            <div class="mx-10 flex justify-start items-center">
                <label for="delivery_date" class="block text-gray-700 font-semibold w-64">PREFERED DELIVERY DATE:</label>
                <input type="date" id="delivery_date" name="delivery_date" class="ml-10 block w-60 px-3 py-2 bg-[#EDE7E7] text-[#F44336] border border-gray-300 rounded-md shadow-sm">
            </div>
            <br>
            <div class="mx-10 flex justify-start items-center">
                <label for="delivery_time" class="block text-gray-700 w-64 font-semibold">PREFERED DELIVERY TIME:</label>
                <input type="time" id="delivery_time" name="delivery_time" min="6:00" max="18:00" class="ml-10 block w-60 px-3 py-2 border bg-[#EDE7E7] text-[#F44336] border-gray-300 rounded-md shadow-sm">
            </div>
            <br>
            <div class="mx-10 flex justify-start items-center">
                <label for="delivery_address" class="block text-gray-700 w-64 font-semibold">DELIVERY ADDRESS:</label>
                <select id="delivery_address" name="delivery_address" class="ml-10 block w-96 px-3 py-2 bg-[#EDE7E7] text-[#F44336] border border-gray-300 rounded-md shadow-sm">
                    <option value="option0" selected>None</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>            </div>
            <br>
            <hr class="border-b-2">
            <br> --}}



            <div class="font-bold text-2xl">Payment Method</div>
            <br>
            <div class="w-3/4 m-auto flex gap-5">
                <div class="border-2 border-black text-center w-40 py-5">COD</div>
                <div class="border-2 border-black text-center w-40 py-5">PICK UP</div>
            </div>
            <br>
            <hr class="border-b-2">
            <br>

            <div class="flex justify-between items-center my-10">
                <div>&lt; return to cart</div>
                <button id="order" class="w-fit border-2 border-[#F55447] bg-[#F44336] hover:bg-[#D22115] text-white text-lg shadow-sm shadow-gray-600 py-1 px-10 rounded-r-sm rounded-l-sm">
                    PLACE ORDER
                </button>
            </div>
            <br><br>
        </div>
    </main>



    <div id="confirmation" class="hidden fixed inset-0 bg-black bg-opacity-50 w-full h-screen z-50 overflow-auto py-10">
        <div class="w-3/5 overflow-auto bg-gray-50 m-auto  relative shadow-xl shadow-black border-2 rounded-md">
            <div class="bg-[#ffdab9] text-end  px-10 py-2 h-fit sticky inset-0 flex justify-between items-center">
                <div>
                    <span class="font-semibold">Order Confirmation</span>
                </div>
                <button id="cancel" class="bg-red-500 hover:bg-[#D22115] w-10 h-10 rounded-md shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden">
                    <svg
                        class="w-7 h-7 m-auto"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 384 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#fff" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                    </svg>
                </button>
            </div>
            <div class="px-20 py-5">
                <table class="table-fixed w-full">
                    <tr class="border-y-2">
                        <td class="w-72 p-2">
                            <div class="w-60 h-60 m-auto shadow-md border rounded-sm">
                                <img src="/images/cakes/memo-cake (1).jpg" alt="cake" class="w-full h-full object-cover " >
                            </div>
                        </td>
                        <td class="w-auto px-5">
                            <ol>
                                <li>Name:</li><br><br>
                                <li>Age:</li>
                                <li>Candle:</li>
                                <li>Dedication:</li>
                            </ol>
                        </td>
                    </tr>
                </table>
                <br>

                <span class="font-semibold">Delivery Date</span>
                <div class="px-10">
                    <br>
                    <div>Date: mm/dd/yy</div>
                    <div>Time: 00:00 AM</div>
                </div>
                <br>

                <span class="font-semibold">Address</span>
                <div class="px-10">
                    <br>
                    Katipunan, Vilanueva, Misamis Oriental
                </div>
                <br>

                <span class="font-semibold">Payment Method</span>
                <div class="px-10">
                    <br>
                    COD
                </div>
                <br>
                <hr class="border-b-2">
                <br><br>

                <div class="flex justify-between w-3/4 m-auto">
                    <div class="text-xl font-bold">TOTAL</div>
                    <div>
                        <div class="text-3xl font-bold">
                            &#8369;
                            <span class="ml-2"> 00.00 </span>
                        </div>
                    </div>
                </div>


            </div>
            <div class="sticky bottom-0 p-3">
                <button class="w-full border-2 border-[#F55447] bg-[#F44336] hover:bg-[#D22115] text-white text-xl shadow-sm shadow-gray-600 py-3 font-bold px-10 rounded-r-sm rounded-l-sm">
                    CONFIRM ORDER
                </button>
            </div>
            <br><br>
        </div>
    </div>

    <x-footer></x-footer>

    <script>
        let order = document.getElementById('order');
        let confirmation = document.getElementById('confirmation');
        let cancel = document.getElementById('cancel');

        order.addEventListener('click', function() {
            confirmation.classList.remove('hidden');
            confirmation.classList.add('flex');
            document.body.style.overflow = 'hidden';
        });
        cancel.addEventListener('click', function() {
            confirmation.classList.add('hidden');
            confirmation.classList.remove('flex');
            document.body.style.overflow = 'auto';
        });
    </script>
</x-layout>


