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
                        <option value="pending" class="bg-yellow-500 hover:bg-yellow-500">Pending</option>
                        <option value="baking" class="bg-orange-500">Baking</option>
                        <option value="ready" class="bg-green-500">For Delivery/Pickup</option>
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
                                    <div class="py-1 px-2 bg-[#D9D9D9] border border-r-0 border-gray-500 rounded-l-md hidden">STATUS</div>
                                    <select class="py-1 border border-gray-500 rounded-r-md text-white font-semibold status-item hidden">
                                        <option value="pending" class="bg-yellow-500 hover:bg-yellow-500">Pending</option>
                                        <option value="baking" class="bg-orange-500">Baking</option>
                                        <option value="ready" class="bg-green-500">For Delivery/Pickup</option>
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
                            <li class="flex gap-2 items-center">
                                <svg
                                    class='w-3'
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/>
                                </svg>
                                <span>N/A</span>
                            </li>
                            <li class="flex gap-2 items-center">
                                <svg
                                    class='w-3'
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                                </svg>
                                <span>N/A</span>
                            </li>
                            <li class="flex gap-2 items-center">
                                <svg
                                    class='w-3'
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                                </svg>
                                <span>N/A</span>
                            </li>
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
                        <span class="ml-2" id="order-total">00.00</span>
                    </div>
                </div>
            </div>
            <br><br>

        </div>
    </div>
</div>
