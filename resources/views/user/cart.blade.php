<x-layout>
    <x-header></x-header>

    <main class="pt-20 w-full bg-white px-20">
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
            <tr class="border-y-2">
                <td class="text-center">
                    <input type="checkbox" class="w-7 h-7">
                </td>
                <td class="p-5 m-auto">
                    <div class="w-48 h-48 ">
                        <img src="/images/cakes/memo-cake (1).jpg" alt="cake" class="w-full h-full object-cover shadow-md" >
                    </div>
                </td>
                <td class="px-10">
                    Name: <br> Age: <br> Dedication: <br> Candle:
                </td>
                <td class="text-center">quantity</td>
                <td class="text-center">price</td>
                <td class="text-center">
                    <button class="bg-red-700 w-5 h-5 shadow-sm font-bold text-3xl m-0 p-0">&times;</button>
                </td>
            </tr>
        </table>

        <div>
            <div>total 250.00 PHP</div>
            <div>CONTINUE</div>

            <div>continue shopping</div>
        </div>
    </main>

    <x-footer></x-footer>
</x-layout>
