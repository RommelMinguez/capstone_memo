<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class=" w-5/6">

            <div class="bg-[#ffdab9] shadow-md  pt-24 px-10 pb-4 font-bold text-xl">
                Dashboard
            </div>

            <div class="p-10">
                <div class="flex  items-center gap-x-10 gap-y-5 flex-wrap">
                    <a href="/admin/orders?filter=pending" class="w-60 h-32 rounded-sm shadow-md shadow-gray-400 bg-white flex justify-between items-center p-7 cursor-pointer">
                        <div>
                            <div class="text-4xl font-bold mb-2">{{ $statusCount['pending'] ?? 0 }}</div>
                            <div class="text-xs">Pending Orders</div>
                        </div>
                        <div class="h-full">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="48" height="48"
                                viewBox="0 0 24 24">
                                <path fill="#F55447" d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h4.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H19q.825 0 1.413.588T21 5v6.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm7-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5"/>
                            </svg>
                        </div>
                    </a>
                    <a href="/admin/orders?filter=baking" class="w-60 h-32 rounded-sm shadow-md shadow-gray-400 bg-white flex justify-between items-center p-7 cursor-pointer">
                        <div>
                            <div class="text-4xl font-bold mb-2">{{ $statusCount['baking'] ?? 0 }}</div>
                            <div class="text-xs">Baking</div>
                        </div>
                        <div class="h-full">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="48"
                                height="48"
                                viewBox="0 0 36 36">
                                <path fill="#F55447" d="M3 7.5A4.5 4.5 0 0 1 7.5 3h17A4.5 4.5 0 0 1 29 7.5v17a4.5 4.5 0 0 1-4.5 4.5h-17A4.5 4.5 0 0 1 3 24.5zm24 0A2.5 2.5 0 0 0 24.5 5h-17A2.5 2.5 0 0 0 5 7.5V11h22zm0 17V13H5v11.5A2.5 2.5 0 0 0 7.5 27h17a2.5 2.5 0 0 0 2.5-2.5m-17-15a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m6 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M23.5 8a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0M9 23v-6h14v6zm-.5-8A1.5 1.5 0 0 0 7 16.5v7A1.5 1.5 0 0 0 8.5 25h15a1.5 1.5 0 0 0 1.5-1.5v-7a1.5 1.5 0 0 0-1.5-1.5z"/>
                            </svg>
                        </div>
                    </a>
                    <a href="/admin/orders?filter=receive" class="w-60 h-32 rounded-sm shadow-md shadow-gray-400 bg-white flex justify-between items-center p-7 cursor-pointer">
                        <div>
                            <div class="text-4xl font-bold mb-2">{{ $statusCount['ready'] ?? 0 }}</div>
                            <div class="text-xs">For Delivery</div>
                        </div>
                        <div class="h-full">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="48"
                                height="48"
                                viewBox="0 0 24 24">
                                <path fill="#F55447" d="m9.564 8.73l.515 1.863c.485 1.755.727 2.633 1.44 3.032c.713.4 1.618.164 3.428-.306l1.92-.5c1.81-.47 2.715-.705 3.127-1.396c.412-.692.17-1.57-.316-3.325l-.514-1.862c-.485-1.756-.728-2.634-1.44-3.033c-.714-.4-1.619-.164-3.429.307l-1.92.498c-1.81.47-2.715.706-3.126 1.398c-.412.691-.17 1.569.315 3.324"/>
                                <path fill="#F55447" d="M2.277 5.247a.75.75 0 0 1 .924-.522l1.703.472A2.71 2.71 0 0 1 6.8 7.075l2.151 7.786l.158.547a2.96 2.96 0 0 1 1.522 1.267l.31-.096l8.87-2.305a.75.75 0 1 1 .378 1.452l-8.837 2.296l-.33.102c-.006 1.27-.883 2.432-2.21 2.776c-1.59.414-3.225-.502-3.651-2.044s.518-3.129 2.108-3.542q.119-.03.237-.052L5.354 7.474a1.21 1.21 0 0 0-.85-.831L2.8 6.17a.75.75 0 0 1-.523-.923"/>
                            </svg>
                        </div>
                    </a>
                    {{-- <div class="w-60 h-32 rounded-sm shadow-md shadow-gray-400 bg-white flex justify-between items-center p-7 cursor-pointer">
                        <div>
                            <div class="text-4xl font-bold mb-2">{{ $statusCount['review'] }}</div>
                            <div class="text-xs">To Review</div>
                        </div>
                        <div class="h-full">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-10"
                                viewBox="0 0 512 512">
                                <path fill="#F55447" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4
                                    24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5
                                    6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4
                                    22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0
                                    48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1
                                    0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z"
                                />
                            </svg>
                        </div>
                    </div> --}}
                    <a href="/admin/orders?filter=completed" class="w-60 h-32 rounded-sm shadow-md shadow-gray-400 bg-white flex justify-between items-center p-7 cursor-pointer">
                        <div>
                            <div class="text-4xl font-bold mb-2">{{ $statusCount['completed'] ?? 0 }}</div>
                            <div class="text-xs">Completed</div>
                        </div>
                        <div class="h-full">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="48"
                                height="48"
                                viewBox="0 0 36 36">
                                <path fill="#F55447" d="m22 27.18l-2.59-2.59L18 26l4 4l8-8l-1.41-1.41z"/>
                                <path fill="#F55447" d="M25 5h-3V4a2.006 2.006 0 0 0-2-2h-8a2.006 2.006 0 0 0-2 2v1H7a2.006 2.006 0 0 0-2 2v21a2.006 2.006 0 0 0 2 2h9v-2H7V7h3v3h12V7h3v11h2V7a2.006 2.006 0 0 0-2-2m-5 3h-8V4h8Z"/>
                            </svg>
                        </div>
                    </a>
                    <a href="/admin/orders?filter=canceled" class="w-60 h-32 rounded-sm shadow-md shadow-gray-400 bg-white flex justify-between items-center p-7 cursor-pointer">
                        <div>
                            <div class="text-4xl font-bold mb-2">{{ $statusCount['canceled'] ?? 0 }}</div>
                            <div class="text-xs">Canceled</div>
                        </div>
                        <div class="h-full">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="3em"
                                height="3em"
                                viewBox="0 0 48 48">
                                <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path stroke="#F55447" d="m21.875 21.875l6.25 6.25m0-6.25l-6.25 6.25"/>
                                    <path stroke="#F55447" d="M14.583 6.25H37.5a2.083 2.083 0 0 1 2.083 2.083v33.334A2.083 2.083 0 0 1 37.5 43.75h-25a2.083 2.083 0 0 1-2.083-2.083v-31.25zm-4.166 4.167h4.166V6.25z"/>
                                </g>
                            </svg>
                        </div>
                    </a>
                </div>

                {{-- OVERALL SUMMARY --}}
                <br><br><hr class="border-b-2"><br><br>

                <div class="flex justify-center items-center gap-x-10 gap-y-10 flex-wrap">

                    <a href="/admin/orders" class="w-60 h-32 rounded-sm shadow-md shadow-gray-400 bg-white flex justify-between items-center p-7 cursor-pointer">
                        <div>
                            <div class="text-4xl font-bold mb-2">{{ $totalOrder }}</div>
                            <div class="text-xs">Total Orders</div>
                        </div>
                        <div class="h-full">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="3em"
                                height="3em"
                                viewBox="0 0 48 48">
                                <g fill='none' stroke="#F55447" stroke-linejoin="round" stroke-width="4">
                                    <rect width="30" height="36" x="9" y="8" rx="2"/>
                                    <path stroke-linecap="round" d="M18 4v6m12-6v6m-14 9h16m-16 8h12m-12 8h8"/>
                                </g>
                            </svg>
                        </div>
                    </a>

                    <div class="min:w-60 h-32 rounded-sm shadow-md shadow-gray-400 bg-[#F55447] flex justify-between items-center gap-5 p-7 cursor-pointer">
                        <div class="text-white">
                            <div class="text-4xl font-bold mb-2">{{ number_format($income, 2, '.', ',') }}</div>
                            <div class="text-xs">Income</div>
                        </div>
                        <div class="h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 36 36">
                                <path fill="#fff" d="M14.18 13.8V16h9.45a5 5 0 0 0 .08-.89a4.7 4.7 0 0 0-.2-1.31Z" class="clr-i-solid clr-i-solid-path-1" />
                                <path fill="#fff" d="M14.18 19.7h5.19a4.28 4.28 0 0 0 3.5-1.9h-8.69Z" class="clr-i-solid clr-i-solid-path-2" />
                                <path fill="#fff" d="M19.37 10.51h-5.19V12h8.37a4.21 4.21 0 0 0-3.18-1.49" class="clr-i-solid clr-i-solid-path-3" />
                                <path fill="#fff" d="M17.67 2a16 16 0 1 0 16 16a16 16 0 0 0-16-16m10.5 15.8H25.7a6.87 6.87 0 0 1-6.33 4.4h-5.19v6.54a1.25 1.25 0 1 1-2.5 0V17.8H8.76a.9.9 0 1 1 0-1.8h2.92v-2.2H8.76a.9.9 0 1 1 0-1.8h2.92V9.26A1.25 1.25 0 0 1 12.93 8h6.44a6.84 6.84 0 0 1 6.15 4h2.65a.9.9 0 0 1 0 1.8h-2.08a7 7 0 0 1 .12 1.3a7 7 0 0 1-.06.9h2a.9.9 0 0 1 0 1.8Z" class="clr-i-solid clr-i-solid-path-4" />
                                <path fill="none" d="M0 0h36v36H0z" />
                            </svg>
                        </div>
                    </div>

                    @if ($bestSeller)
                        <a href="/cakes/{{ $bestSeller->id }}">
                            <div class="min:w-60 h-32 rounded-sm shadow-md shadow-gray-400 bg-[#ffeff5] flex justify-between items-center gap-5 p-7 cursor-pointer">
                                <div >
                                    <div class="text-4xl font-bold mb-2">{{ $bestSeller->name }}</div>
                                    <div class="text-xs">Top Selling Cake</div>
                                </div>
                                <div class="h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24">
                                        <g fill="none">
                                            <path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/>
                                            <path fill="#F55447" d="m11.514 2.142l-1.26-.755l-.24 1.449C9.632 5.124 8.069 7.25 6.345 8.744C2.97 11.67 2.231 14.85 3.276 17.475c1 2.512 3.538 4.232 6.114 4.519l.596.066c-1.474-.901-2.42-3.006-2.09-4.579c.326-1.546 1.438-2.994 3.574-4.33l1.077-.672l.402 1.205c.237.712.647 1.284 1.064 1.865c.2.28.403.563.589.864c.643 1.045.813 2.207.398 3.36c-.378 1.048-1.001 1.872-1.86 2.329l.97-.108c2.418-.269 4.193-1.096 5.346-2.479C20.599 18.144 21 16.379 21 14.5c0-1.75-.719-3.554-1.567-5.055c-.994-1.758-2.291-3.218-3.707-4.633c-.245.49-.226.688-.73 1.475a8.15 8.15 0 0 0-3.482-4.145"/>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endif

                </div>



                {{-- TABLE --}}
                <br><br><hr class="border-b-2">

                <div class="p-10">
                    <div class="bg-[#FFEFF5] rounded-lg shadow-md p-5">
                        <div class="pb-5 flex justify-between items-center">
                            <div class="font-bold text-xl">Recent Orders</div>
                            <div class="rounded-md bg-red-500 py-1 px-4 text-white"><a href="/admin/orders">See All &RightArrow;</a></div>
                        </div>
                        <table class="border-collapse w-full table-fixed">
                            <thead class="border-y-2">
                                <tr class="bg-[#eedee4]">
                                    <th class="p-2 w-20">No.</th>
                                    <th class="p-2 w-auto">Customer Name</th>
                                    <th class="p-2 w-auto">Cake</th>
                                    <th class="p-2 w-auto">Date Ordered</th>
                                    <th class="p-2 w-40">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestOrders as $order)
                                    <tr class="text-center border-b odd:bg-[#feebf2]">
                                        <td >{{ $order->order_id }}</td>
                                        <td>
                                            <div  class="flex justify-start gap-3 items-center px-5">
                                                <img src="{{ Storage::url($order->order->user->image_src) }}" alt="Profile Picture" class="aspect-square w-7 rounded-full shadow-md border">
                                                {{ $order->order->user->last_name }}, {{ $order->order->user->first_name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-start gap-3 items-center px-5">
                                                <img src="{{ Storage::url($order->cake->image_src) }}" alt="Cake Image" class="aspect-square w-7 rounded-full shadow-md border">
                                                {{ $order->cake->name }}
                                            </div>
                                        </td>
                                        <td >{{ $order->created_at->diffForHumans() }}</td>
                                        <td >{{ $order->order->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if (count($latestOrders) == 0)
                            <p class="p-5 text-center">No Records Found.</p>
                        @endif
                    </div>
                </div>


            </div>
        </main>
    </div>

</x-layout>
