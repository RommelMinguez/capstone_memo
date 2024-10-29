@php
    $statusCount = [
        'pending' => '',
        'baking' => '',
        'receive' => '',
        'review' => '',
        'completed' => '',
        'canceled' => '',
    ];

    // foreach ($allItems as $status => $items) {
    //     $statusCount[$status] = count($items);
    // }
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
                <ul class="flex cursor-pointer border-b-2 w-fit relative gap-1">
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] relative z-20">
                        Processing
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
                        To Receive
                        <div class="absolute rounded-full bg-red-500 px-1 top-0 right-1 text-xs font-light text-white  h-fit min-w-4 text-center  number-indicator">
                            {{ $statusCount['receive'] }}
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
                            {{ $statusCount['canceled'] }}
                        </d>
                    </li>
                    <li class="bg-[#fbefd2] rounded-t-lg order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">
                        All Orders
                    </li>
                </ul>


                <table class="table-fixed w-full">

                   <tbody>
                        @foreach ($customOrders as $item)
                            <x-track-custom-item :item="$item"></x-track-custom-item>
                        @endforeach
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
