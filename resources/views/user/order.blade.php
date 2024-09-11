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
                <x-nav-link type='button' :isButton='true' class="px-40" id="order">
                    PLACE ORDER
                </x-nav-link>
            </div>
            <br><br><br>
        </div>
    </main>

    <x-order-confirmation></x-order-confirmation>

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


