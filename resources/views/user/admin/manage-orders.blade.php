@php
use Carbon\Carbon;
@endphp

<x-layout :useDatatableCDN="true">

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="w-5/6">

            <div class="bg-[#ffdab9] shadow-md pt-24 px-10 pb-4  flex justify-between">
                <div class="font-bold text-xl">
                    Manage Orders
                </div>
                <a href="/cakes">
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
                </a>
            </div>

            <div class="p-5">

                <div class="bg-gray-50 rounded-lg h-fit shadow-md shadow-gray-500">

                    <div class="p-5">

                        <div class="flex">
                            <ul class="flex cursor-pointer w-fit relative text-sm">
                                <li id="reset-filter" class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20 border-b-2 border-red-500 bg-[#eedee4] rounded-t-lg text-red-500">
                                    All Orders
                                </li>
                                <li id="filter-pending" class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20 relative">
                                    Pending
                                    <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center hidden number-indicator">0</d>
                                </li>
                                <li id="filter-baking" class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20 relative">
                                    Baking
                                    <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center hidden number-indicator">0</d>
                                </li>
                                <li id="filter-receive" class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20 relative">
                                    For Delivery
                                    <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center hidden number-indicator">0</d>
                                </li>
                                {{-- <li id="filter-review" class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20 relative ">
                                    To Review
                                    <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center hidden number-indicator">0</d>
                                </li> --}}
                                <li id="filter-completed" class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20 relative">
                                    Completed
                                    <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center hidden number-indicator">0</d>
                                </li>
                                <li id="filter-canceled" class="order-tab px-5 pt-2 pb-4 font-semibold hover:text-[#F55447] z-20 relative">
                                    Canceled
                                    <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center hidden number-indicator">0</d>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 rounded-b-xl rounded-tr-xl border shadow-md p-3">
                            <table id="order_all" class="display border-collapse w-full table-fixed">
                                <thead>
                                    <tr class="border-y-2">
                                        <th class=" w-20">Item no.</th>
                                        <th class=" w-20">Order no.</th>
                                        <th class=" w-auto">Customer Name</th>
                                        <th class=" w-auto">Cake Name</th>
                                        <th class=" w-auto">Date Ordered</th>
                                        <th class=" w-28">Total</th>
                                        <th class=" w-28">Status</th>
                                        {{-- <th class=" w-auto">Delivery Date</th> --}}
                                        <th class=" w-28">Action</th>
                                    </tr>
                                </thead>

                                @php
                                    $bgStatus = [
                                        'pending' => 'text-yellow-500',
                                        'baking' => 'text-orange-500',
                                        'receive' => 'text-green-500',
                                        'completed' => 'text-blue-500',
                                        'canceled' => 'text-red-500',
                                    ]
                                @endphp

                                <tbody>
                                    @foreach($allOrders as $order)
                                        {{-- @php
                                            // use Carbon\Carbon;
                                            $formattedTime = Carbon::parse($order->order->prefered_time)->format('H:i');
                                            $formattedDate = Carbon::parse($order->order->prefered_date)->format('F d, Y');
                                        @endphp --}}
                                        <tr class="orderDetails border-b" data-id="{{ $order->id }}">
                                            <td class="cursor-pointer text-center">{{ $order->id }}</td>
                                            <td class="cursor-pointer text-center">{{ $order->order->id }}</td>
                                            <td class="cursor-pointer ">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-6 aspect-square rounded-full shadow-md overflow-hidden inline-block border">
                                                        <img src="{{ Storage::url($order->order->user->image_src) }}" alt="profile pic" class="object-cover">
                                                    </div>
                                                    <div class="inline-block">
                                                        {{ $order->order->user->first_name }} {{ $order->order->user->last_name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cursor-pointer">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-6 aspect-square rounded-full border shadow-md overflow-hidden inline-block">
                                                        <img src="{{ Storage::url($order->cake->image_src) }}" alt="profile pic" class="object-cover">
                                                    </div>
                                                    <span>
                                                        {{ $order->cake->name }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="cursor-pointer text-center font-semibold">{{ $order->created_at->diffForHumans() }}</td>
                                            <td class="cursor-pointer text-center">&#8369; &nbsp;{{ number_format($order->sub_total, 2) }}</td>
                                            <td class="cursor-pointer text-center {{ $bgStatus[$order->status] }}">{{ $order->status }}</td>
                                            {{-- <td class="cursor-pointer text-center">{{ $formattedDate }} <br> {{ $formattedTime }}</td> --}}
                                            <td class="py-2 text-center">
                                                <button type="button" class="text-white text-xs py-1 px-3 rounded-md shadow-md bg-[#F55447] cursor-pointer active:scale-95">
                                                    DETAILS
                                                </button>
                                            </td>
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

    @session('success')
        <x-response-success>{{ session('success') }}</x-response-success>
    @endsession

    <x-order-full-detail></x-order-full-detail>

    <script>
        let filterWord = '{!! request()->filter !!}';
    </script>
    <script src="/js/manage_order.js" defer></script>

</x-layout>
