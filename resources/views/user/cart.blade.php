<x-layout>
    <x-header></x-header>

    <main class="pt-20 pb-40 w-full bg-white px-20">
        <div class="pt-10 pb-5">
            <div class="text-3xl font-bold">YOUR CART</div>
            <p class="text-lg">PLEASE CHECK YOUR PREFERED DELIVERY DATE & TIME</p>
        </div>


        <table class="w-full table-fixed ">
            <thead>
                <tr class="border-y-2">
                    <th class="w-20 py-5">ITEMS</th>
                    <th class="w-60">IMAGE</th>
                    <th class="w-auto">DETAILS</th>
                    <th class="w-40">QUANTITY</th>
                    <th class="w-40">PRICE</th>
                    <th class="w-20">OPTION</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($cart->cartItems as $item)
                    <x-cart-item :item="$item"></x-cart-item>
                @endforeach


            </tbody>
        </table>

        @if(count($cart->cartItems) == 0)
            <br>
            <div class="text-center mt-10 italic text-xl">
                Your Cart is empty ;(
                <br><br>
                <a href="/cakes" class="underline text-red-500">explore</a>
            </div>
        @endif

        <form action="/user/cart/check-out" method="POST" id="form-order" class="{{ count($cart->cartItems) == 0 ? 'hidden':'' }}">
            @csrf
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


    <script src="/js/cart.js" defer></script>

</x-layout>
