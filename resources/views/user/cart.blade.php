<x-layout>
    <x-header></x-header>

    <main class="pt-20 pb-40 w-full bg-white px-20">
        <div class="pt-10 pb-5">
            <div class="text-3xl font-bold">YOUR CART</div>
            <p class="text-lg">PLEASE CHECK YOUR PREFERED DELIVERY DATE & TIME</p>
        </div>


        <table class="w-full table-fixed ">
            <tr class="border-y-2">
                <th class="w-20 py-5">ITEMS</th>
                <th class="w-60">IMAGE</th>
                <th class="w-auto">DETAILS</th>
                <th class="w-40">QUANTITY</th>
                <th class="w-40">PRICE</th>
                <th class="w-20">OPTION</th>
            </tr>


            {{-- @for($i = 0; $i < 2; $i++)
                <x-cart-item></x-cart-item>
            @endfor --}}
            @foreach ($cart->cartItems as $item)
                <x-cart-item :item="$item"></x-cart-item>
            @endforeach


        </table>

        <form action="/user/order" method="GET" id="form-order">

            <div class="flex justify-end my-5">
                <div class="flex flex-col gap-5">
                    <div>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart->cartItems as $item)
                            <div class="font-light text-sm flex justify-between px-3 sub-total">
                                <div>{{ $item->cake->name }} (x{{ $item->quantity }})</div>
                                <div>{{ $item->cake->price * $item->quantity }} PHP</div>
                            </div>
                            <span class="hidden">{{ $total += $item->cake->price * $item->quantity }}</span>
                        @endforeach
                        <span class="hidden" id="total-price" data-total="{{ $total }}"></span>
                    </div>
                    <div class="font-bold text-2xl">TOTAL <span class="ml-40" id="display-total">{{ $total }} </span> PHP</div>
                    <x-nav-link :isButton='true' type='submit' class="w-full">CONTINUE</x-nav-link>
                    <div class="text-end hover:underline"><a href="/cakes">continue shopping &gt;</a></div>

                </div>
            </div>
        </form>
    </main>

    <x-footer></x-footer>


    <script>

        // CHECKBOX
        let checkBox = document.querySelectorAll('.cart-check-box');
        let cartItems = document.querySelectorAll('.cart-row');
        let subTotal = document.querySelectorAll('.sub-total');
        let total = document.getElementById('total-price').getAttribute('data-total');
        let displayTotal = document.getElementById('display-total');
        document.addEventListener('DOMContentLoaded', function() {
            checkBox.forEach((element, index) => {
                if (element.checked) {
                    cartItems[index].classList.add('bg-[#FEF6E4]');
                }
                element.addEventListener('click', function() {
                    if (element.checked) {
                        cartItems[index].classList.add('bg-[#FEF6E4]');
                        subTotal[index].classList.remove('hidden');

                        total += +checkBox[index].getAttribute('data-price');
                        displayTotal.textContent = total;
                    } else {
                        cartItems[index].classList.remove('bg-[#FEF6E4]');
                        subTotal[index].classList.add('hidden');

                        total -= +checkBox[index].getAttribute('data-price');
                        displayTotal.textContent = total;
                    }
                })
            });
        });

        // REMOVE ITEMS
        let showModal = document.querySelectorAll('.show-modal');
        let closeModal = document.querySelectorAll('.close-modal');
        let modal = document.querySelectorAll('.modal_confirmation');
        let removeItem = document.querySelectorAll('.confirm-remove');
        let formRemove = document.querySelectorAll('.form-remove');
        showModal.forEach((element, index) => {
            element.addEventListener('click', function() {
                modal[index].classList.remove('hidden');
                modal[index].classList.add('fixed');
                document.body.style.overflow = 'hidden';
            });
        });

        closeModal.forEach((element, index) => {
            element.addEventListener('click', function() {
                modal[index].classList.remove('fixed');
                modal[index].classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        });
        removeItem.forEach((element, index) => {
            element.addEventListener('click', function() {
                formRemove[index].submit();
            });
        });

        // Quantity Behavior
        let quantityAdd = document.querySelectorAll('.plus-quantity');
        let quantityMinus = document.querySelectorAll('.minus-quantity');
        let quantity = document.querySelectorAll('.quantity');
        quantityAdd.forEach((element, index) => {
            element.addEventListener('click', function() {
                quantity[index].value = (quantity[index].value >= 99) ? quantity[index].value:++quantity[index].value;
            });
        });
        quantityMinus.forEach((element, index) => {
            element.addEventListener('click', function() {
                quantity[index].value = (quantity[index].value <= 1) ? quantity[index].value:--quantity[index].value;
            });
        });


        //EDIT DETAILS
        let itemAge = document.querySelectorAll('.item-age');
        let itemCandle = document.querySelectorAll('.item-candle');
        let itemDedication = document.querySelectorAll('.item-dedication');

        itemAge.forEach((element, index) => {
            element.addEventListener('change', function() {
                element.classList.add('text-orange-500');
                console.log('ok');

            });
        });

    </script>

</x-layout>
