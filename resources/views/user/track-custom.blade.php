@php
    $statusCount = [
        'new' => '',
        'approved' => '',
        'pending' => '',
        'baking' => '',
        'ready' => '',
        'review' => '',
        'completed' => '',
        'canceled' => '',
        'rejected' => '',
    ];

    foreach ($customOrders as $status => $items) {
        $statusCount[$status] = count($items);
    }
@endphp


<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-20 w-5/6">
            <div class="py-10 px-20 font-bold text-3xl">
                Custom Design Orders
            </div>
            <div class="px-10 py-5">
                <ul class="flex cursor-pointer border-b-2 w-fit relative gap-2">
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        New Request
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['new'] }}
                        </d>
                    </li>
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Approved
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['approved'] }}
                        </d>
                    </li>
                    <li class="border-2 border-[#ffdab9] border-dashed"></li>
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Pending
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['pending'] }}
                        </d>
                    </li>
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Baking
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['baking'] }}
                        </d>
                    </li>
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        To Receive/Pick-up
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['ready'] }}
                        </d>
                    </li>
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Completed
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['completed'] == 0 ? '':$statusCount['completed'] }}
                        </d>
                    </li>
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Canceled
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ ((int) $statusCount['canceled'] + (int) $statusCount['rejected']) }}
                        </d>
                    </li>
                    <li class="border-2 border-[#ffdab9] border-dashed"></li>
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">
                        All
                    </li>
                </ul>


                <table class="table-fixed w-full">

                   {{-- <tbody>
                        @foreach ($customOrders as $item)
                            <x-track-custom-item :item="$item"></x-track-custom-item>
                        @endforeach
                   </tbody> --}}




                    <tbody class="order-content">
                        @if (isset($customOrders['new']))
                            @foreach ($customOrders['new'] as $item)
                                <x-track-custom-item :item="$item"></x-track-custom-item>
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($customOrders['approved']))
                            @foreach ($customOrders['approved'] as $item)
                                <x-track-custom-item :item="$item"></x-track-custom-item>
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($customOrders['pending']))
                            @foreach ($customOrders['pending'] as $item)
                                <x-track-custom-item :item="$item"></x-track-custom-item>
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($customOrders['baking']))
                            @foreach ($customOrders['baking'] as $item)
                                <x-track-custom-item :item="$item"></x-track-custom-item>
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($customOrders['ready']))
                            @foreach ($customOrders['ready'] as $item)
                                <x-track-custom-item :item="$item"></x-track-custom-item>
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($customOrders['completed']))
                            @foreach ($customOrders['completed'] as $item)
                                <x-track-custom-item :item="$item"></x-track-custom-item>
                            @endforeach
                        @endif
                    </tbody>
                    <tbody class="order-content">
                        @if (isset($customOrders['canceled']))
                            @foreach ($customOrders['canceled'] as $item)
                                <x-track-custom-item :item="$item"></x-track-custom-item>
                            @endforeach
                        @endif
                        @if (isset($customOrders['rejected']))
                            @foreach ($customOrders['rejected'] as $item)
                                <x-track-custom-item :item="$item"></x-track-custom-item>
                            @endforeach
                        @endif
                    </tbody>


                </table>


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

    <x-track-custom-details></x-track-custom-details>

    <script src="/js/track_custom.js" defer></script>
</x-layout>
