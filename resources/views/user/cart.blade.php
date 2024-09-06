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


            @for($i = 0; $i < 2; $i++)
                <x-cart-item></x-cart-item>
            @endfor


        </table>

        <div class="flex justify-end my-5">
            <div>
                <div class="font-bold text-2xl">TOTAL <span class="ml-40">00.00 PHP</span></div><br>
                <div class="flex justify-end">
                    <div>
                        <x-nav-link>CONTINUE</x-nav-link>
                        <div class="mt-5">continue shopping &gt;</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer></x-footer>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('cb');
            const row = document.getElementById('row');

            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    row.classList.add('bg-[#ffdbba]')
                } else {
                    row.classList.remove('bg-[#ffdbba]')
                }
            });
        });
    </script>

</x-layout>
