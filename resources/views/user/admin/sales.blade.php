<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="w-5/6">
            <div class="bg-[#ffdab9] shadow-md  pt-24 px-10 pb-4 font-bold text-xl">
                Sales Report
            </div>

            <div class="m-5 bg-[#ffeff5] rounded-lg border shadow-md flex overflow-hidden">

                {{-- Main chaart --}}
                <div class="w-10/12 border-r p-5">
                    <div class="flex justify-between">
                        <div class="font-bold text-lg">Sales Overview</div>
                        <div class="flex items-center gap-10">
                            <label for="date" class="bg-red-500 rounded-sm text-white py-1  flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="w-5 h-5 ml-4">
                                    <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9M4 9V7a2 2 0 0 1 2-2h2M4 9h16m0 0V7a2 2 0 0 0-2-2h-2m0 0V3m0 2H8m0-2v2" />
                                </svg>
                                <select name="date" id="date" class="bg-red-500 pr-4">
                                    <option value="">Sep. 1,2001</option>
                                    <option value="">Sep. 1,2001</option>
                                    <option value="">Sep. 1,2001</option>
                                    <option value="">Sep. 1,2001</option>
                                </select>
                            </label>
                            <button type="button" class="bg-blue-500 rounded-sm shadow-sm hover:bg-blue-600 active:scale-95 py-1 px-4 flex text-white items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v9m0-9l3 3m-3-3l-3 3m8.5 2c1.519 0 2.5-1.231 2.5-2.75a2.75 2.75 0 0 0-2.016-2.65A5 5 0 0 0 8.37 8.108a3.5 3.5 0 0 0-1.87 6.746" />
                                </svg>
                                Export
                            </button>
                        </div>
                    </div>

                    <br><br>

                    <div class="">
                        <div class="m-auto">
                            <canvas id="sales"></canvas>
                        </div>
                    </div>

                    <br><br><br>

                    <div class="flex">
                        <div class="w-5/12 p-5 flex flex-col gap-10">
                            <div>
                                <div class="font-bold mb-2">Total Orders</div>
                                <div class="border p-5 rounded-xl">
                                    <div class="m-auto h-40">
                                        <canvas id="total-orders"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="font-bold mb-2">Total Sales</div>
                                <div class="border p-5 rounded-xl">
                                    order
                                </div>
                            </div>
                        </div>
                        <div class="w-7/12 p-5">
                            <div class="border-2 rounded-lg overflow-auto h-full">
                                <table class="w-full table-fixed">
                                    <thead class="border-b-4">
                                        <tr class="py-2">
                                            <th>Cake Name</th>
                                            <th>Category</th>
                                            <th>Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 0; $i < 10; $i++)
                                            <tr class="py-1 text-center">
                                                <td>cake</td>
                                                <td>others</td>
                                                <td>100pcs</td>
                                            </tr>
                                        @endfor
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Side Panel --}}
                <div class="w-2/12">

                </div>

            </div>





        </main>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('sales');
        const totalOrders = document.getElementById('totalOrders');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['1', '2', '3', '4', '5', '6', '7'],
                datasets: [{
                    label: '# of sales',
                    data: [1, 5, 0, 3, 2, 1, 2],
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        });





        const DATA_COUNT = 5;
        const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};

        const data = {
        labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
        datasets: [
            {
            label: 'Dataset 1',
            data: Utils.numbers(NUMBER_CFG),
            backgroundColor: Object.values(Utils.CHART_COLORS),
            }
        ]
        };

        new Chart(totalOrders, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Doughnut Chart'
                }
                }
            },
        });


    </script>


</x-layout>
