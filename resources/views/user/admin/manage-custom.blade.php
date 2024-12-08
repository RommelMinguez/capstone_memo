
<x-layout :useDatatableCDN='true'>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-20 w-5/6">
            <div class="py-10 px-20 font-bold text-3xl">
                Manage Custom Design Orders
            </div>
            <div class="px-10 py-5">
                <ul class="flex cursor-pointer w-fit relative gap-1">
                    <li id="filter-new" class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20 border-gray-400">
                        New Request
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator"></div>
                    </li>
                    <li id="filter-approved" class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20 border-gray-400">
                        Approved
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator"></div>
                    </li>
                    <li class="border-2 border-[#ffdab9] border-dashed"></li>
                    <li id="filter-pending" class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20 border-gray-400">
                        Pending
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator"></div>
                    </li>
                    <li id="filter-baking" class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20 border-gray-400">
                        Baking
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator"></div>
                    </li>
                    <li id="filter-ready" class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20 border-gray-400">
                        To Deliver/Pick-up
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator"></div>
                    </li>
                    <li id="filter-completed" class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20 border-gray-400">
                        Completed
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator"></div>
                    </li>
                    <li id="filter-canceled" class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20 border-gray-400">
                        Canceled/Rejected
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator"></div>
                    </li>
                    <li class="border-2 border-[#ffdab9] border-dashed"></li>
                    <li id="reset-filter" class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20 border-gray-400">
                        All
                    </li>
                </ul>

                <div class="bg-gray-50 rounded-b-xl rounded-tr-xl border shadow-md p-3">
                    <table id="custom_orders_table" class="display border-collapse w-full table-fixed">
                        <thead>
                            <tr class="border-y-2">
                                <th class="w-20">ID</th>
                                <th class="w-52 p-2">Image</th>
                                <th class="w-auto px-3">Details</th>
                                <th class="w-40">Given Price</th>
                                <th class="w-10">Status</th>
                            </tr>
                        </thead>

                    <tbody>
                            @foreach ($customOrders as $item)
                                <x-manage-custom-item :item="$item"></x-manage-custom-item>
                            @endforeach
                    </tbody>

                    </table>
                </div>


                <div id="empty-msg" class="{{ count($customOrders) == 0 ? '':'hidden' }}">
                    <br>
                    <div class="text-center mt-10 italic text-xl">
                        Your custom order list is currently empty. <br>
                        Please visit the <a href="/cakes/custom" class="underline text-red-500">custom orders</a> section to create a new order.
                    </div>
                </div>
        </main>
    </div>


    @session('success')
        <x-response-success>{{ session('success') }}</x-response-success>
    @endsession
    @session('error')
        <x-response-failed>{{ session('error') }}</x-response-failed>
    @endsession
    @if ($errors->any())
        @php
            $errorMessages = '';
            if ($errors->any()) {
                foreach ($errors->all() as $error) {
                    $errorMessages .= $error . "\n";
                }
            }
        @endphp
        <x-response-failed>{{ $errorMessages }}</x-response-failed>
    @endif


    <x-manage-custom-details></x-manage-custom-details>




    <script>
        let filterWord = '{!! request()->filter !!}';
        let table = null;

        $(document).ready(function() {
            table = $('#custom_orders_table').DataTable({
                columns: [
                    { data: 'id' },
                    { data: 'image' },
                    { data: 'details' },
                    { data: 'budget' },
                    { data: 'status', visible: false },
                ],
                searchCols: [
                    null,
                    null,
                    null,
                    null,
                    { search: "new" },
                ],
                "order": [[0, "desc"]]
            });

            $('#reset-filter').on('click', function() {
                table.column(4).search('').draw(); // Clear the search to show all records
            });

            // Button to filter by  status
            $('#filter-new').on('click', function() {
                table.column(4).search('new').draw();
            });
            $('#filter-approved').on('click', function() {
                table.column(4).search('approved').draw();
            });
            $('#filter-pending').on('click', function() {
                table.column(4).search('pending').draw();
            });
            $('#filter-baking').on('click', function() {
                table.column(4).search('baking').draw();
            });
            $('#filter-ready').on('click', function() {
                table.column(4).search('ready').draw();
            });
            $('#filter-completed').on('click', function() {
                table.column(4).search('completed').draw();
            });
            $('#filter-canceled').on('click', function() {
                table.column(4).search('canceled|rejected', true, false).draw();
            });

            updateFilterCount();
            defaultFilter();
        });
    </script>
    <script src="/js/manage_custom.js" defer></script>

</x-layout>
