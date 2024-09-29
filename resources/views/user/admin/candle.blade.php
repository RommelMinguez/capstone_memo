<x-layout :useDatatableCDN="true">

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="w-5/6">

            <div class="bg-[#ffdab9] shadow-md pt-24 px-10 pb-4  flex justify-between">
                <div class="font-bold text-xl">
                    Manage Candle Type
                </div>
                <button type="button" class="p-2 rounded-md bg-[#F55447] text-white shadow-md font-semibold hover:bg-red-500 active:scale-95 flex items-center gap-2">
                    <svg
                    class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#fff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                    </svg>
                    <span>Add New</span>
                </button>
            </div>

            <div class="p-5">

                <div class="bg-[#FFEFF5] rounded-lg h-fit shadow-md shadow-gray-500">

                    <div class="p-5">

                        <div class="bg-gray-100 rounded-b-xl rounded-tr-xl border shadow-md p-3">
                            <table id="dataTableInit" class="display border-collapse w-full table-fixed">
                                <thead>
                                    <tr class="border-y-2">
                                        <th class=" w-auto">Candle Type</th>
                                        <th class=" w-auto">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i < 100; $i++)
                                        <tr class="orderDetails border-b">
                                            <td class="cursor-pointer">Number Candle</td>
                                            <td class="py-2">
                                                <button>
                                                    edit
                                                </button>
                                                <button>
                                                    delete
                                                </button>
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

</x-layout>
