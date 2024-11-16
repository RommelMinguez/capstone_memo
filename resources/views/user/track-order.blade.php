@php
    $statusCount = [
        'pending' => '',
        'baking' => '',
        'ready' => '',
        'review' => '',
        'completed' => '',
        'canceled' => '',
    ];

    foreach ($orders as $status => $items) {
        $statusCount[$status] = count($items);
    }
@endphp

<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-20 w-5/6">
            <div class="py-10 px-20 font-bold text-3xl">
                My Orders
            </div>
            <div class="px-10 py-5">
                <ul class="flex cursor-pointer border-b-2 w-fit relative gap-2">
                    <li class="order-tab bg-[#fbefd2] rounded-t-lg  px-5 py-2 font-semibold hover:text-[#F55447] z-20">
                        All Orders
                    </li>
                    <li class="order-tab bg-[#fbefd2] rounded-t-lg  px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Pending
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['pending'] }}
                        </d>
                    </li>
                    <li class="order-tab bg-[#fbefd2] rounded-t-lg  px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Baking
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['baking'] }}
                        </d>
                    </li>
                    <li class="order-tab bg-[#fbefd2] rounded-t-lg  px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        To Receive/Pick-up
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['ready'] }}
                        </d>
                    </li>
                    <li class="order-tab bg-[#fbefd2] rounded-t-lg  px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        To Review
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['review'] == 0 ? '':$statusCount['review'] }}
                        </d>
                    </li>
                    <li class="order-tab bg-[#fbefd2] rounded-t-lg  px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Completed
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['completed'] == 0 ? '':$statusCount['completed'] }}
                        </d>
                    </li>
                    <li class="order-tab bg-[#fbefd2] rounded-t-lg  px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Canceled
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['canceled'] }}
                        </d>
                    </li>

                    {{-- <li id="selected-tab" class="absolute h-full border-b-2 border-red-500 bg-[#eaeaea] rounded-t-lg text-red-500"></li> --}}
                </ul>

                <table class="table-fixed w-full">
                    {{-- <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody> --}}

                    {{-- @foreach ($items as $item)
                        <x-track-order-item :item="$item" class="order-{{ $item->status }}"></x-track-order-item>
                    @endforeach --}}
                    {{-- @foreach ($allItems as $status => $items)
                        @foreach ($items as $item)
                            <x-track-order-item :item="$item" class="order-{{ $status }}"></x-track-order-item>
                        @endforeach
                    @endforeach --}}
                    <tbody class="order-content">
                        @if (isset($orders['pending']))
                            @foreach ($orders['pending'] as $order)
                                @foreach ($order->orderItems as $item)
                                    <x-track-order-item :item="$item" :order="$order"></x-track-order-item>
                                @endforeach
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($orders['baking']))
                            @foreach ($orders['baking'] as $order)
                                @foreach ($order->orderItems as $item)
                                    <x-track-order-item :item="$item" :order="$order"></x-track-order-item>
                                @endforeach
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($orders['ready']))
                            @foreach ($orders['ready'] as $order)
                                @foreach ($order->orderItems as $item)
                                    <x-track-order-item :item="$item" :order="$order"></x-track-order-item>
                                @endforeach
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($orders['review']))
                            @foreach ($orders['review'] as $order)
                                @foreach ($order->orderItems as $item)
                                    <x-track-order-item :item="$item" :order="$order"></x-track-order-item>
                                @endforeach
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($orders['completed']))
                            @foreach ($orders['completed'] as $order)
                                @foreach ($order->orderItems as $item)
                                    <x-track-order-item :item="$item" :order="$order"></x-track-order-item>
                                @endforeach
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($orders['canceled']))
                            @foreach ($orders['canceled'] as $order)
                                @foreach ($order->orderItems as $item)
                                    <x-track-order-item :item="$item" :order="$order"></x-track-order-item>
                                @endforeach
                            @endforeach
                        @endif
                    </tbody>

                </table>

                <div id="empty-msg" class="{{ count($orders) == 0 ? '':'hidden' }}">
                    <br>
                    <div class="text-center mt-10 italic text-xl">
                        Your Order List is empty ;(
                        <br><br>
                        <a href="/user/cart" class="underline text-red-500">go to cart</a>
                    </div>
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

    <x-order-details></x-order-details>


    <script>
        let reviewsArr = {!! json_encode($reviews) !!};
    </script>
    <script src="/js/track_order.js" defer></script>

</x-layout>
