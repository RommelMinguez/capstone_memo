<x-layout>

    <x-header></x-header>

    <main class="w-full">
        <div class="bg-[#F8EBEB] p-20 w-full">
            <h2 class="text-xl font-bold my-10">Order Summary</h2>

            <table class="table-fixed border-collapse w-3/4  m-auto ">
                @php
                    $total = 0;
                @endphp
                @foreach ($items as $item)
                        <x-order-item :item="$item"></x-order-item>
                        <span class="hidden">{{ $total += $item->cake->price * $item->quantity }}</span>
                @endforeach
            </table>

            <br><hr class="border-b-2"><br><br>

            <div class="flex justify-between w-3/4 m-auto">
                <div class="text-xl font-bold">TOTAL</div>
                <div>
                    <div class="text-3xl font-bold">
                        &#8369;
                        <span class="ml-2"> {{ number_format($total, 2) }} </span>
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
                    <input form="form-place-order" required type="date" id="delivery_date" name="delivery_date" class="block w-full px-3 py-2 bg-[#EDE7E7] border border-gray-300 text-[#F44336] font-semibold rounded-md shadow-sm">
                </div>
                <br>
                <hr class="border-b-2">
                <br>

                <div class="font-semibold">SELECT DELIVERY TIME</div>
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
                    <input form="form-place-order" required type="time" id="delivery_time" name="delivery_time" min="6:00" max="18:00" class="block w-full px-3 py-2 border bg-[#EDE7E7]  border-gray-300 text-[#F44336] font-semibold rounded-md shadow-sm">
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

            <div class="font-bold text-2xl">Payment Method</div>
            <br>
            <div class="w-3/4 m-auto flex gap-5">
                <div class="inp_payment cursor-pointer border-2 border-black text-xl text-center p-5 w-40 hover:bg-[#F44336] hover:text-white active:scale-95">
                    <div>COD</div>
                    <div class="text-sm italic">cash on delivery</div>
                </div>
                <div class="inp_payment cursor-pointer border-2 border-black text-xl text-center p-5 w-40 hover:bg-[#F44336] hover:text-white active:scale-95 flex items-center justify-center">
                    PICK UP
                </div>
            </div>
            <input form="form-place-order" type="hidden" name="payment_method" id="payment_method" value="PICK UP">
            <br>
            <hr class="border-b-2">
            <br>

            <div class="flex justify-between items-center my-10">
                <a href="/user/cart" class="hover:underline">&lt; return to cart</a>
                <x-nav-link type='button' :isButton='true' class="px-40" id="order">
                    PLACE ORDER
                </x-nav-link>
            </div>
            <br><br><br>

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
            <br>
        --}}

        </div>
    </main>


    <x-order-confirmation :items="$items" total="{{ $total }}"></x-order-confirmation>


    <x-footer></x-footer>

    <script>

        // CONFIRM ORDER
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

        //SCHEDULE DATE TIME
        const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const monthsOfYear = [
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ];
        let buttonDate = document.querySelectorAll('.inp_date');
        let deliveryDate = document.getElementById('delivery_date');
        let buttonTime = document.querySelectorAll('.inp_time');
        let deliveryTime = document.getElementById('delivery_time');

        let confirmDate = document.getElementById('confirm-date');
        let confirmTime = document.getElementById('confirm-time');
        let confirmPayment = document.getElementById('confirm-payment');


        document.addEventListener('DOMContentLoaded', function() {
            setDateTimeDefault();

            // date input
            buttonDate.forEach((element, index) => { //button real time content
                let today = new Date();
                today.setDate(today.getDate() + index);

                let dayLabel = 'Sunday';
                if (index == 0) dayLabel = 'Today';
                else if (index == 1) dayLabel = 'Tommorow';
                else dayLabel = daysOfWeek[today.getDay()];

                element.children[0].textContent = dayLabel;
                element.children[1].textContent = monthsOfYear[(today.getMonth())] + '/' + today.getDate() + '/' + today.getFullYear();

                element.addEventListener('click', function() { // button is clicked
                    const formattedDate = today.toISOString().split('T')[0];
                    deliveryDate.value = formattedDate;
                    confirmDate.textContent = formattedDate;

                    buttonDate.forEach((button, i) => {
                        if (index == i) {
                            button.classList.add('bg-[#F44336]');
                            button.classList.add('text-white');
                        } else {
                            button.classList.remove('bg-[#F44336]');
                            button.classList.remove('text-white');
                        }
                    });
                });
            });

            // time input
            buttonTime.forEach((element, index) => { //formated text content
                let hour = 8 + index;
                let format12 = hour > 12 ? hour-12:hour;
                element.children[0].textContent = String(format12).padStart(2,'0') + ':00';

                element.addEventListener('click', function() { // button is clicked
                    let formattedHour = String(hour).padStart(2, '0');
                    deliveryTime.value = formattedHour + ':00';
                    confirmTime.textContent = deliveryTime.value;

                    buttonTime.forEach((button, i) => {
                        if (index == i) {
                            button.classList.add('bg-[#F44336]');
                            button.classList.add('text-white');
                        } else {
                            button.classList.remove('bg-[#F44336]');
                            button.classList.remove('text-white');
                        }
                    });
                });
            });
        });
        //update button design
        deliveryDate.addEventListener('change', function() {
            buttonDate.forEach(element => {
                element.classList.remove('bg-[#F44336]');
                element.classList.remove('text-white');
            })
        });
        deliveryTime.addEventListener('change', function() {
            buttonDate.forEach(element => {
                element.classList.remove('bg-[#F44336]');
                element.classList.remove('text-white');
            })
        });
        //set current date time as default value
        function setDateTimeDefault() {
            let defaultDate = new Date();
            let formattedDate = defaultDate.toISOString().split('T')[0];
            deliveryDate.setAttribute('min',  formattedDate);
            deliveryDate.value = formattedDate;
            buttonDate[0].classList.add('bg-[#F44336]');
            buttonDate[0].classList.add('text-white');

            let hour = String(defaultDate.getHours()).padStart(2, '0');
            deliveryTime.value = hour + ':00';

            buttonPayment[1].classList.add('bg-[#F44336]');
            buttonPayment[1].classList.add('text-white');

            confirmDate.textContent = formattedDate;
            confirmTime.textContent = deliveryTime.value;
            confirmPayment.textContent = paymentMethod.value;
        }


        //PAYMENT METHOD INPUT
        let buttonPayment = document.querySelectorAll('.inp_payment');
        let paymentMethod = document.getElementById('payment_method');
        buttonPayment.forEach((element, index) => {
            element.addEventListener('click', function() {
                paymentMethod.value = index == 0 ? 'COD':'PICK UP';
                confirmPayment.textContent = paymentMethod.value;

                buttonPayment.forEach((button, i) => {
                    if (index == i) {
                        button.classList.add('bg-[#F44336]');
                        button.classList.add('text-white');
                    } else {
                        button.classList.remove('bg-[#F44336]');
                        button.classList.remove('text-white');
                    }
                });
            })
        });
    </script>
</x-layout>


