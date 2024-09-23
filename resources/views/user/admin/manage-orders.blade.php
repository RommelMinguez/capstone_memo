<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="w-5/6">

            <div class="bg-[#ffdab9] shadow-md  pt-24 px-10 pb-4 font-bold text-xl">
                Manage Orders
            </div>

            <div class="p-5">

                <div class="bg-[#FFEFF5] rounded-lg h-screen shadow-md shadow-gray-500">

                    <div class="p-5">

                        <div class="font-bold text-xl">
                            Orders
                        </div>
                        <br><br>

                        <div class="flex justify-between">
                            <ul class="flex cursor-pointer border-b-2 w-fit relative text-sm">
                                <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">All Orders</li>
                                <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">Pending</li>
                                <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">Baking</li>
                                <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">To Receive</li>
                                <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20 ">To Review</li>
                                <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">Completed</li>
                                <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">Canceled</li>
                            </ul>

                            <div>
                                <input type="text" class="w-60 px-2 py-1" placeholder="Search Here...">
                            </div>
                        </div>

                        <table class="border-collapse w-full table-fixed">
                            <thead class="border-y-2">
                                <tr class="bg-[#eedee4]">
                                    <th class="p-2 w-20">No.</th>
                                    <th class="p-2 w-auto">Customer Name</th>
                                    <th class="p-2 w-auto">Cake</th>
                                    <th class="p-2 w-auto">Date</th>
                                    <th class="p-2 w-40">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 0; $i < 10; $i++)
                                    <tr class="text-center border-b {{ $i % 2 == 0 ? 'bg-[#feebf2]':'' }}">
                                        <td >{{ $i }}</td>
                                        <td >Juan Dela Cruz</td>
                                        <td >Vanilla Cake</td>
                                        <td >2024/09/24</td>
                                        <td >pending</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </main>
    </div>


    <script>
        let tabs = document.querySelectorAll('.order-tab')
        tabs.forEach((element, index) => {
            element.addEventListener('click', function() {
                tabs.forEach((e, i) => {
                    e.classList.remove('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');
                });
                element.classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');
            });
        });
    </script>

</x-layout>
