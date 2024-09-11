<x-layout>
    <x-header></x-header>

    <main class="pt-20 pb-40 w-full bg-white px-20">
        <div class="pt-10 pb-5">
            <div class="text-3xl font-bold">YOUR CART</div>
            <p class="text-lg">PLEASE CHECK YOUR PREFERED DELIVERY DATE & TIME</p>
        </div>

        <form action="" method="POST">
            <table class="w-full table-fixed ">
                <tr class="border-y-2">
                    <th class="w-20 py-5">ITEMS</th>
                    <th class="w-60">IMAGE</th>
                    <th class="w-auto">DETAILS</th>
                    <th class="w-40">QUANTITY</th>
                    <th class="w-40">PRICE</th>
                    <th class="w-20">OPTION</th>
                </tr>


                @for($i = 0; $i < 2; $i++)
                    <x-cart-item></x-cart-item>
                @endfor


            </table>

            <div class="flex justify-end my-5">
                <div class="flex flex-col gap-5">
                    <div class="font-light text-sm flex justify-between px-3">
                        <div>subtotal</div>
                        <div>00.00 PHP</div>
                    </div>
                    <div class="font-bold text-2xl">TOTAL <span class="ml-40">00.00 PHP</span></div>
                    <x-nav-link :isButton='true' type='submit' class="w-full">CONTINUE</x-nav-link>
                    <div class="text-end"><a href="/cakes">continue shopping &gt;</a></div>

                </div>
            </div>
        </form>
    </main>

    <x-footer></x-footer>


    <script>

        let checkBox = document.querySelectorAll('.cart-check-box');
        let cartItems = document.querySelectorAll('.cart-row');

        document.addEventListener('DOMContentLoaded', function() {
            cartItems.forEach((element, index) => {
                element.addEventListener('click', function() {
                    if (checkBox[index].checked) {
                        element.classList.add('bg-[#FEF6E4]');
                    } else {
                        element.classList.remove('bg-[#FEF6E4]');
                    }
                })
            });
        });

    </script>

</x-layout>
