<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="w-5/6">
            <div class="bg-[#ffdab9] shadow-md  pt-24 px-10 pb-4 font-bold text-xl">
                Sales Report
            </div>

            <div class="m-5 bg-[#ffeff5] rounded-lg border shadow-md overflow-hidden">

                {{-- SALES OVERVIEW --}}
                <div class="flex w-full p-5">
                    <div class="w-9/12">
                        <div class="flex justify-between">
                            <div class="font-bold text-lg">Sales Overview</div>
                            <div class="flex items-center gap-10">
                                <label for="date-select" class="bg-red-500 rounded-sm text-white py-1  flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="w-5 h-5 ml-4">
                                        <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9M4 9V7a2 2 0 0 1 2-2h2M4 9h16m0 0V7a2 2 0 0 0-2-2h-2m0 0V3m0 2H8m0-2v2" />
                                    </svg>
                                    <select name="date" id="date-select" class="bg-red-500 pr-4 outline-none">

                                        @foreach($salesData as $key => $sales)
                                            @php
                                                list($year, $month) = explode('_', $key);
                                                $monthName = \Carbon\Carbon::createFromFormat('m', $month)->format('F');
                                                $formattedKey = $monthName . ' ' . $year;
                                            @endphp

                                            <option value="{{ $key }}" data-sales="{{ json_encode($sales) }}">
                                                {{ $formattedKey }}
                                            </option>
                                        @endforeach

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
                    </div>

                    {{-- TOTAL PROFIT --}}
                    <div class="w-3/12 border-l-2 ml-5 border-gray-500">
                        <div class="pl-5">
                            <div class="font-bold mb-2">Profit Made</div>
                            <div class="border-2 border-gray-300 rounded-xl p-5 font-bold">
                                <div class="font-bold text-2xl text-red-500">

                                    @php
                                        function formatNumber($number) {
                                            if ($number >= 1000 && $number < 1000000) {
                                                return number_format($number / 1000, 2) . 'K';
                                            } elseif ($number >= 1000000) {
                                                return number_format($number / 1000000, 2) . 'M';
                                            }
                                            return number_format($number, 2);
                                        }
                                    @endphp

                                   {{ formatNumber($totalSales) }}
                                   <span class="text-base">PHP</span>
                                </div>
                                <div class="font-semibold text-sm text-gray-400">
                                    Total Profit
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br><hr class="border-b-2"><br>

                <div class="flex w-full p-5">
                    {{-- TOTAL ORDER & SALES --}}
                    <div class="w-5/12 p-5 flex flex-col gap-10">
                        <div>
                            <div class="font-bold mb-2">Total Orders</div>
                            <div class="border-2 border-gray-300 rounded-xl px-5 max-h-72 flex justify-center">
                                <canvas class="h-full" id="totalOrders"></canvas>
                            </div>
                        </div>
                        <div>
                            <div class="font-bold mb-2">Total Sales</div>
                            <div class="border-2 border-gray-300 rounded-xl px-5 max-h-72 flex justify-center">
                                <canvas class="h-full" id="totalSales"></canvas>
                            </div>
                        </div>
                    </div>

                    {{-- TOP CAKES & CUSTOMER --}}
                    <div class="w-7/12 p-5">
                        <div class="font-bold mb-2">Top Selling Cakes</div>
                        <div class="border-2 border-gray-300 rounded-xl overflow-hidden">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr class="border-b-2 border-gray-300 bg-gray-200 bg-opacity-50">
                                    <th class="p-2 text-left">Cake Name</th>
                                    <th class="p-2 w-1/3 min-w-[120px]">Price</th>
                                    <th class="p-2 w-1/3 min-w-[120px]">Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topCakes as $cake)
                                        <tr class="border-b last:border-b-0 hover:bg-gray-50">
                                            <td class="p-3 flex items-center gap-3">
                                                <div class="inline-block min-w-[28px] w-7 h-7 overflow-hidden rounded-full border border-gray-200 shadow-md">
                                                    <img src="{{ Storage::url($cake->image_src) }}" alt="Cake Image" class="object-cover w-full h-full">
                                                </div>
                                                <span class="truncate max-w-72">{{ $cake->name }}</span>
                                            </td>
                                            <td class="text-center p-2 min-w-[120px] w-1/3">{{ $cake->price }}php</td>
                                            <td class="text-center p-2 min-w-[120px] w-1/3">{{ $cake->total_quantity }}pcs</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <br><br>

                        {{-- CUSTOMER --}}
                        <div class="font-bold mb-2">Top Customer</div>
                        <div class="border-2 border-gray-300 rounded-xl overflow-hidden">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr class="border-b-2 border-gray-300 bg-gray-200 bg-opacity-50">
                                    <th class="p-2 text-left">Name</th>
                                    <th class="p-2 w-1/3 min-w-[120px]">Total Order Placed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($topCustomers as $customer)
                                        <tr class="border-b last:border-b-0 hover:bg-gray-50">
                                            <td class="p-3 flex items-center gap-3">
                                                <div class="inline-block min-w-[32px] w-8 h-8 overflow-hidden rounded-full border border-gray-200 shadow-md">
                                                    <img src="{{ Storage::url($customer->image_src) }}" alt="Profile Image" class="object-cover w-full h-full">
                                                </div>
                                                <div class="truncate max-w-72">
                                                    <div class="font-semibold">
                                                        {{ $customer->first_name.' '.$customer->last_name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $customer->email }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center p-2 min-w-[120px] w-1/2">{{ $customer->order_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        // SALES OVERVIEW
        const ctx = document.getElementById('sales');
        const totalOrders = document.getElementById('totalOrders');

        let salesOverview = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: '# of sales',
                    data: [],
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Days',
                            font: {
                                size: 14
                            }
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Total Sales (₱)',
                            font: {
                                size: 14
                            }
                        },
                        beginAtZero: true
                    }
                }
            }
        });

        let date_inp = document.getElementById('date-select');

        date_inp.addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            let data = JSON.parse(selectedOption.getAttribute('data-sales'));

            // format data to feed to chart
            let labelsArr = [];
            let totalSalesArr = [];
            let [year, month] = this.value.split('_').map(Number);
            let daysInMonth = new Date(year, month, 0).getDate();

            for (let day = 1; day <= daysInMonth; day++) {
                labelsArr.push(day);
                let salesDataForDay = data.find(item => Number(item.day) === day);
                totalSalesArr.push(salesDataForDay ? salesDataForDay.total_sales : 0);
            }

            // Update the chart
            salesOverview.data.labels = labelsArr;
            salesOverview.data.datasets[0].data = totalSalesArr;
            salesOverview.data.datasets[0].label = 'Sales for ' + selectedOption.text;
            salesOverview.update();
        })
        date_inp.dispatchEvent(new Event('change'));




        // TOTAL ORDERS
        const totalOrderData = {!! json_encode($topCakes) !!};

        const ctxTotalOrder = document.getElementById('totalOrders').getContext('2d');
        const myDoughnutChart = new Chart(ctxTotalOrder, {
            type: 'doughnut',
            data: {
                labels: totalOrderData.map(item => item.name),
                datasets: [{
                    label: 'Total Orders',
                    data: totalOrderData.map(item => item.total_quantity),
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    tooltip: {
                        callbacks: {
                            label: (tooltipItem) => {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        // TOTAL SALES
        const ctxTotalSales = document.getElementById('totalSales').getContext('2d');
        const myDoughnutChart2 = new Chart(ctxTotalSales, {
            type: 'doughnut',
            data: {
                labels: totalOrderData.map(item => item.name),
                datasets: [{
                    label: 'Total Sales',
                    data: totalOrderData.map(item => item.total_sales),
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    tooltip: {
                        callbacks: {
                            label: (tooltipItem) => {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });







    </script>


</x-layout>
