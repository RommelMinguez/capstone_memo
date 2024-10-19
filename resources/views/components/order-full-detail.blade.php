<div id="order-detail-content" class="fixed hidden inset-0 bg-black bg-opacity-50 w-full h-screen z-50 overflow-auto py-10">
    {{-- <div class="absolute w-full h-full border-8"></div> --}}
    <div class="w-3/5 overflow-auto bg-gray-50 m-auto  relative shadow-xl shadow-black border-2 rounded-md">
        <div class="bg-[#ffdab9] text-end  px-10 py-2 h-fit sticky inset-0 flex justify-between items-center">
            <div>
                <span class="font-semibold">Order Details</span>
            </div>
            <button id="close-order-detail" class="bg-red-500 hover:bg-[#D22115] aspect-square w-7 rounded-md shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden">
                <svg
                    class="aspect-square w-4 m-auto"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512">
                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#fff" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                </svg>
            </button>
        </div>




        <div id="detail-loading" class="p-20">
            <x-loading></x-loading>
        </div>

        <div id="detail-content-load" class="px-20 hidden">

            <div class="flex justify-between  py-5">
                <div class="font-bold text-xl ">Order # <span id="order-id">0</span></div>
                <div class="flex text-xs">
                    <div class="py-1 px-2 bg-[#D9D9D9] border border-r-0 border-gray-500 rounded-l-md">STATUS</div>
                    <select id="status-set-all" class="py-1 border bg-[#D9D9D9] border-gray-500 rounded-r-md text-white font-semibold">
                        <option value="" disabled selected></option>
                        <option value="pending" class="bg-yellow-500 hover:bg-yellow-500">Pending</option>
                        <option value="baking" class="bg-orange-500">Baking</option>
                        <option value="receive" class="bg-green-500">To Recieve</option>
                        {{-- <option value="review" class="bg-blue-500">To Review</option> --}}
                        <option value="completed" class="bg-blue-500">Completed</option>
                        <option value="canceled" class="bg-red-500">Cancel</option>
                    </select>
                </div>
            </div>

            <table id="display-order-item" class="table-fixed w-full">

                    <tr id="order-item" class="border-y-2 ">
                        <td class="w-48 p-2">
                            <div class="w-40 h-40 m-auto shadow-md border rounded-sm">
                                <img src="" alt="cake" class="w-full h-full object-cover " >
                            </div>
                        </td>
                        <td class="w-auto px-5">
                            <ol>
                                <li class="flex gap-5">
                                    <span>Cake Name</span>
                                    <span class="text-base italic">xN</span>
                                </li>
                                <li class="text-xs text-red-500"> &#8369; <span>00.00</span></li>
                                <br>
                                <li>Age: <span>1</span></li>
                                <li>Candle: <span>none</span></li>
                                <li>Dedication: <span>sample text</span></li>
                            </ol>
                        </td>
                        <td class="w-32 text-center h-full">
                            <div class="flex flex-col justify-between h-40">
                                <div class="flex text-xs">
                                    <div class="py-1 px-2 bg-[#D9D9D9] border border-r-0 border-gray-500 rounded-l-md">STATUS</div>
                                    <select class="py-1 border border-gray-500 rounded-r-md text-white font-semibold status-item">
                                        <option value="pending" class="bg-yellow-500 hover:bg-yellow-500">Pending</option>
                                        <option value="baking" class="bg-orange-500">Baking</option>
                                        <option value="receive" class="bg-green-500">To Recieve</option>
                                        {{-- <option value="review" class="bg-blue-500">To Review</option> --}}
                                        <option value="completed" class="bg-blue-500">Completed</option>
                                        <option value="canceled" class="bg-red-500">Cancel</option>
                                    </select>
                                </div>
                                <div class="font-bold text-red-500">&#8369; <span>00.00</span></div>
                                <div></div>
                            </div>
                        </td>
                    </tr>

            </table>


            <br>

            {{-- FULL INFORMATION --}}
            <div class="flex justify-between">

                {{-- CUSTOMER INFORMATION --}}
                <div class="w-7/12 mb-5">
                    <div class="font-bold mb-5">
                        Customer Information
                    </div>
                    <div class="ml-10">
                        <ul id="customer-info">
                            <li>Customer Name:</li>
                            <li>Email:</li>
                            <li>Contact #:</li>
                        </ul>
                    </div>
                </div>

                {{-- DATE --}}
                <div class="w-5/12 mb-5">
                    <div class="font-bold mb-5">
                        Delivery Date
                    </div>
                    <div class="ml-10">
                        <ul id="delivery-date">
                            <li>DateTime</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="flex justify-between">

                {{-- ADDRESS --}}
                <div class="w-7/12 mb-5">
                    <div class="font-bold mb-5">
                        Address
                    </div>
                    <div class="ml-10">
                        <ul id="address">
                            <li>
                                <span>Name</span>
                                <span class="ml-5 text-gray-600">phone</span>
                            </li>
                            <li>Address:</li>
                            <li>Address:</li>
                        </ul>
                    </div>
                </div>

                {{-- PAYMENT --}}
                <div class="w-5/12 mb-5">
                    <div class="font-bold mb-5">
                        Payment Method
                    </div>
                    <div class="ml-10">
                        <ul id="payment-method">
                            <li>COD</li>
                        </ul>
                    </div>
                </div>
            </div>


            <br><hr><br>

            <div class="flex justify-between w-3/4 m-auto">
                <div class="text-xl font-bold">TOTAL</div>
                <div>
                    <div class="text-3xl font-bold">
                        &#8369;
                        <span class="ml-2">00.00</span>
                    </div>
                </div>
            </div>
            <br><br>

        </div>
    </div>
</div>
