<x-layout :useDatatableCDN="true">

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="w-5/6">

            <div class="bg-[#ffdab9] shadow-md pt-24 px-10 pb-4  flex justify-between">
                <div class="font-bold text-xl">
                    Manage Orders
                </div>
                <button type="button" class="p-2 rounded-md bg-[#F55447] text-white shadow-md font-semibold hover:bg-red-500 active:scale-95 flex items-center gap-2">
                    <svg
                    class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#fff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                    </svg>
                    <span>Create Order</span>
                </button>
            </div>

            <div class="p-5">

                <div class="bg-[#FFEFF5] rounded-lg h-fit shadow-md shadow-gray-500">

                    <div class="p-5">

                        <div class="flex">
                            <ul class="flex cursor-pointer w-fit relative text-sm">
                                <li class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20 border-b-2 border-red-500 bg-[#eedee4] rounded-t-lg text-red-500">All Orders</li>
                                <li class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20">Pending</li>
                                <li class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20">Baking</li>
                                <li class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20">To Receive</li>
                                <li class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20 ">To Review</li>
                                <li class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20">Completed</li>
                                <li class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20">Canceled</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 rounded-b-xl rounded-tr-xl border shadow-md p-3">
                            <table id="dataTableInit" class="display border-collapse w-full table-fixed">
                                <thead>
                                    <tr class="border-y-2">
                                        <th class=" w-14">ID</th>
                                        <th class=" w-auto">Customer Name</th>
                                        <th class=" w-auto">Cake Name</th>
                                        <th class=" w-auto">Order Date</th>
                                        <th class=" w-auto">Total Amount</th>
                                        <th class=" w-auto">Status</th>
                                        <th class=" w-auto">Delivery Date</th>
                                        <th class=" w-auto">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i < 100; $i++)
                                        <tr class="orderDetails border-b">
                                            <td class="cursor-pointer">{{ $i }}</td>
                                            <td class="cursor-pointer">Juan Dela Cruz</td>
                                            <td class="cursor-pointer">Vanilla Cake</td>
                                            <td class="cursor-pointer">2024/09/24</td>
                                            <td class="cursor-pointer">150.00</td>
                                            <td class="cursor-pointer">pending</td>
                                            <td class="cursor-pointer">2024/09/24</td>
                                            <td class="py-2">
                                                <select class="text-white text-xs p-1 rounded-sm bg-[#F55447]">
                                                    <option value="pending">Pending</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </main>
    </div>


    <script>
        let orderDetail = document.querySelectorAll('.orderDetails')
        orderDetail.forEach((element, index) => {
            element.addEventListener('click', function() {
                console.log(index);

            });
        });
    </script>

</x-layout>
