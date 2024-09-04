<x-layout>


    <x-header></x-header>



    <div class="bg-[#F3D2C1] w-full  rounded-3xl  pt-20">
        {{-- <div id="hide-details" class="absolute left-5 top-24 cursor-pointer text-3xl font-bold">
            <svg
                class="w-14 h-14 p-3 shadow-sm shadow-gray-700"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 384 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#222" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
            </svg>
        </div> --}}
        <div class="w-full flex justify-evenly p-10">
            <div class="w-[540px] h-[740px] bg-gray-400 relative shadow-sm shadow-gray-700" >
                <img src="{{ asset($cake['image_src']) }}" alt="bakeshop" id="cake-image" class="w-full h-full object-cover">
            </div>
            <div class="w-[540px] h-[740px] bg-[#FEF6E4] p-10 shadow-sm rounded-md overflow-auto">
                <div id="cake-name" class="text-3xl font-localLobster mb-2">{{ $cake['name'] }}</div>
                <div class="mb-5 text-lg">* * * * * (0)</div>
                <div class="mb-10 text-xl font-bold text-[#F44336]">
                    <span class="mr-1 text-2xl">&#8369;</span>
                    {{ $cake['price'] }}
                </div>
                <div class="mb-1 w-full h-12 overflow-hidden" style="box-shadow: inset 0px -20px 20px -20px black" id="cake-desc">
                    {{ $cake['description']}}
                </div>
                <button class="mb-5 font-semibold underline" id="show-hide-desc"> Show more </button>
                <hr>
                <form action="" method="GET" class="mt-7 ">
                    <label for="dedication" class="font-bold">Dedication/Message:</label>
                    <textarea
                        class="w-full my-2 bg-[#EDE7E7] rounded-md p-5 shadow-md"
                        name="dedication" id="dedication" cols="30" rows="3" placeholder="Happy Birthday!!"></textarea>
                    <label for="quantity" class="font-bold">Quantity:</label>
                    <div class="my-2 flex shadow-md cursor-pointer w-fit rounded-md overflow-hidden ">
                        <div class="w-10 h-10 bg-[#F44336] font-mono text-3xl font-bold text-center text-white hover:text-2xl active:text-3xl select-none" id="minus-quantity">&minus;</div>
                        <input class="w-14 h-10 bg-[#EDE7E7] font-bold font-mono text-xl pl-4 text-center inline-block" readonly type="number" id="quantity" name="quantity" value="1" min="1" max="99">
                        <div class="w-10 h-10 bg-[#F44336] font-mono text-3xl font-bold text-center text-white hover:text-2xl active:text-3xl select-none" id="plus-quantity">&plus;</div>
                    </div>
                    <div class="flex justify-center mt-10">
                        <button class="border-2 border-[#F55447] bg-[#F44336] hover:bg-[#F55447] text-white text-lg shadow-sm shadow-gray-600 hover:shadow py-1 px-10 rounded-r-sm rounded-l-sm">
                            <svg
                                class="inline-block w-5 h-5  m-auto"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    fill="#ffffff"
                                    d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                            &nbsp; ADD TO CART
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-gray-50 w-full p-20">
            <div class="flex justify-between">
                <div></div>
                <div>Reviews</div>
                <div>write reviews</div>
            </div>

            @for($i = 0; $i < 5; $i++)
                <x-feedback></x-feedback>
            @endfor

            <div class="m-auto pt-10 underline text-center">Read more reviews</div>
        </div>

    </div>

    <x-footer></x-footer>

    <script>
        // Cake Description toggle show-more/less
        let toggleDesc = document.getElementById('show-hide-desc');
        let isShowMore = true;
        let cakeDesc = document.getElementById('cake-desc');

        toggleDesc.addEventListener('click', function() {

            if (isShowMore) {
                toggleDesc.textContent = "Show less";
                cakeDesc.style.height = 'fit-content';
                cakeDesc.style.boxShadow = 'inset 0px 0px 0px 0px black';
                isShowMore = !isShowMore;
            } else {
                toggleDesc.textContent = "Show more";
                cakeDesc.style.height = '48px';
                cakeDesc.style.boxShadow = 'inset 0px -20px 20px -20px black';
                isShowMore = !isShowMore
            }

        });

        // Quantity Behavior
        let quantityAdd = document.getElementById('plus-quantity');
        let quantityMinus = document.getElementById('minus-quantity');
        let quantity = document.getElementById('quantity');

        quantityAdd.addEventListener('click', function() {
            quantity.value = (quantity.value >= 99) ? quantity.value:++quantity.value;
        });
        quantityMinus.addEventListener('click', function() {
            quantity.value = (quantity.value <= 1) ? quantity.value:--quantity.value;
        });
    </script>

</x-layout>
