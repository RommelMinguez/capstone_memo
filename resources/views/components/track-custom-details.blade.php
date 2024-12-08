<div id="order-detail-content" class="hidden  fixed  inset-0 bg-black bg-opacity-50 w-full h-screen z-50 overflow-auto py-10">
    {{-- <div class="absolute w-full h-full border-8"></div> --}}
    <div class="w-3/5 overflow-auto bg-gray-50 m-auto  relative shadow-xl shadow-black border-2 rounded-md">
        <div class="bg-[#ffdab9] text-end  px-10 py-2 h-fit sticky inset-0 flex justify-between items-center">
            <div>
                <span class="font-semibold">Order Details</span>
            </div>
            <button onclick="hideDetails()" class="bg-red-500 hover:bg-[#D22115] aspect-square w-7 rounded-md shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden">
                <svg
                    class="aspect-square w-4 m-auto"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512">
                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#fff" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                </svg>
            </button>
        </div>


        <div id="detail-content-load" class="px-20 ">

            <div class="flex justify-between  py-5">
                <div class="font-bold text-xl ">Order # <span id="order-id">0</span></div>
                <div id="status-display" class="flex items-center h-full font-semibold text-yellow-600">
                    N/A
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
                                </li>
                                <li class="text-base italic">xN</li>
                                <br>
                                <li>Age: <span>1</span></li>
                                <li>Candle: <span>none</span></li>
                                <li>Dedication: <span>sample text</span></li>
                                <li class="my-2">
                                    <a href="#" class="hidden bg-blue-500 py-1 px-4 rounded-md shadow-md hover:bg-blue-600 active:scale-95 text-white font-semibold text-xs">write a review</a>
                                </li>
                            </ol>
                        </td>
                        <td class="w-40 text-center h-full">
                            <div class="flex flex-col justify-between h-40">
                                <div class="flex text-xs">
                                    {{-- <div class="py-1 px-2 bg-[#D9D9D9] border border-r-0 border-gray-500 rounded-l-md">STATUS</div>
                                    <div class="py-1 px-2 border border-gray-500 rounded-r-md text-white" >Pending</div> --}}
                                </div>
                                <div>
                                    <div class="font-semibold mb-3">Given Price</div>
                                    <div class="font-bold text-red-500 text-lg"> &#8369; <span>00.00</span></div>
                                </div>
                                <div></div>
                            </div>
                        </td>
                    </tr>

            </table>


            <br>

            <div class="mb-5">
                <div class="font-bold mb-5">
                    Cake Description
                </div>
                <div class="ml-10" id="cake-description">

                </div>
            </div>

            {{-- <div class="mb-5">
                <div class="font-bold mb-5">
                    Tags
                </div>
                <div class="ml-10 flex flex-wrap gap-2" id="tags-container">
                    <div id="tag-template" class="py-1 px-4 rounded-full bg-red-500 text-white text-center inline-block text-xs cursor-pointer">
                        tags
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <div class="font-bold mb-5">
                    Additional Images
                </div>
                <div class="ml-10 flex flex-wrap gap-2" id="images-container">
                    <div id="image-template" class="h-40 w-40 rounded-md shadow-md overflow-hidden">
                        <img src="" alt="cakes" class="w-full h-full object-cover">
                    </div>
                </div>
            </div> --}}


            {{-- SHOW GIVEN PRICE AND NOTES --}}
            <div id="total-display">
                <br><br>
                <hr class="border-b-2 ">
                <br>

                <div class="font-bold mb-5">
                    Custom Cake Price
                    <span class="bg-[#ffdd55] ml-10 border py-1 px-4 rounded-md font-normal text-sm group relative inline-block cursor-pointer">
                        <div class="flex justify-center gap-2">
                            <svg
                                class="w-3"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l224 0 0-112c0-26.5 21.5-48 48-48l112 0 0-224c0-35.3-28.7-64-64-64L64 32zM448 352l-45.3 0L336 352c-8.8 0-16 7.2-16 16l0 66.7 0 45.3 32-32 64-64 32-32z"/>
                            </svg>
                            <span>
                                See Note
                            </span>
                        </div>
                        <div id="total-note" class="p-5 rounded-lg border absolute left-1/2 -translate-x-1/2 bottom-full hidden group-hover:inline-block w-[300%] text-white bg-gray-800 shadow-md">
                            notes here
                        </div>
                    </span>
                </div>
                <div class="flex justify-between mx-10">
                    <div class="font-bold">
                        Total
                    </div>
                    <div class="font-bold text-2xl"> &#8369; <span id="total-price">00.00</span></div>
                </div>
            </div>


            <br><br>
            <hr class="border-b-2">
            <br><br><br>


            {{-- ORDER BUTTON --}}
            <div id="buttons-response" class="flex flex-col gap-5">
                <div id="response-status-order-btn" class="border-2 border-red-600 bg-red-500 text-white font-bold p-3 text-center rounded-sm hover:bg-red-600 active:scale-y-95 cursor-pointer">
                    PLACE ORDER
                </div>
                <div id="response-status-reject-btn" class="border-2 border-black font-bold p-3 text-center rounded-sm hover:bg-gray-100 active:scale-y-95 cursor-pointer">
                    CANCEL ORDER
                </div>
            </div>


            <br><hr><br>
        </div>
    </div>
</div>



<div class="hidden">
    <form action="/user/custom-order/order/" method="POST" id="place-order-form">
        @csrf
        @method('PATCH')
    </form>
</div>
