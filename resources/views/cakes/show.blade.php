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
            {{-- IMAGE --}}
            <div class="w-[540px] h-[740px] bg-gray-400 relative shadow-sm shadow-gray-700" >
                <img src="{{ Storage::url($cake->image_src) }}" alt="bakeshop" id="cake-image" class="w-full h-full object-cover">
            </div>
            {{-- DETAILS --}}
            <div class="w-[600px] h-[740px] bg-[#FEF6E4] p-10 shadow-sm rounded-md overflow-auto">
                <div id="cake-name" class="text-3xl font-localLobster mb-2">{{ $cake['name'] }}</div>
                <div class="mb-5 text-lg">
                    {{-- RATINGS --}}
                    <div class="flex gap-3 fill-[#f44336]">
                        @php
                            $rating = $reviewRating['average'] ?? 0;
                        @endphp

                        @for($i = 0; $i < 5; $i++, $rating--)
                            @if ($rating >= 1)
                                <svg
                                    class="w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12
                                    3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2
                                    7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                </svg>
                            @elseif($rating > 0)
                                <svg
                                    class="w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M309.5 13.5C305.5 5.2 297.1 0 287.9 0s-17.6 5.2-21.6 13.5L197.7 154.8 44.5 177.5c-9 1.3-16.5 7.6-19.3 16.3s-.5 18.1 5.9 24.5L142.2 328.4 116
                                    483.9c-1.5 9 2.2 18.1 9.7 23.5s17.3 6 25.3 1.7l137-73.2 137 73.2c8.1 4.3 17.9 3.7 25.3-1.7s11.2-14.5 9.7-23.5L433.6 328.4 544.8 218.2c6.5-6.4 8.7-15.9
                                    5.9-24.5s-10.3-14.9-19.3-16.3L378.1 154.8 309.5 13.5zM288 384.7l0-305.6 52.5 108.1c3.5 7.1 10.2 12.1 18.1 13.3l118.3 17.5L391 303c-5.5 5.5-8.1 13.3-6.8
                                    21l20.2 119.6L299.2 387.5c-3.5-1.9-7.4-2.8-11.2-2.8z"/>
                                </svg>
                            @else
                                <svg
                                    class="w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3
                                    6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3
                                    13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8
                                    22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
                                </svg>
                            @endif
                        @endfor
                        <span>({{ $reviewRating['count'] }})</span>
                    </div>
                </div>
                <div class="mb-10 text-xl font-bold text-[#F44336]">
                    <span class="mr-1 text-2xl">&#8369;</span>
                    {{ $cake['price'] }}
                </div>
                {{-- DESCRIPTION --}}
                <div class="mb-1 w-full h-9 overflow-hidden" style="box-shadow: inset 0px -5px 5px -5px gray" id="cake-desc">
                    {{ $cake['description']}}
                    <form action="/cakes/search" method="GET" id="tag_form" class="py-3 flex flex-wrap gap-1">
                        @foreach ($cake->tags as $tag)

                            <button type="submit">
                                <x-cake-tag tagId="{{ $tag->id }}" tagName="selected-tag">{{ $tag->name }}</x-cake-tag>
                            </button>

                        @endforeach
                    </form>
                </div>
                <button class="mb-5 font-semibold underline" id="show-hide-desc"> Show more </button>
                <hr class="border-2 border-gray-400">
                <form id="form-inputs" method="POST" class="mt-7 ">
                    @csrf
                    <div class="mb-5 flex items-center justify-start w-fit">
                        <label for="age" class="font-bold">Age:</label>
                        <input class="ml-5 mr-10 w-20 h-10 bg-[#EDE7E7] font-semibold rounded-md font-mono text-xl pl-4 pr-1 text-center text-[#F44336] shadow-md border inline-block" required  type="number" id="age" name="age" value="1" min="1" max="150">

                        <label for="candle" class="font-bold">Candle:</label>
                        <select id="candle" name="candle" required class="mx-5 w-40 h-10 bg-[#EDE7E7] rounded-md text-[#F44336] font-semibold shadow-md border px-3">
                            <option value="none" selected>None</option>
                            <option value="number candle">Number Candle</option>
                            <option value="simple candle">Simple Candle</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <label for="dedication" class="font-bold">Dedication/Message:</label>
                    <textarea
                        class="w-full my-2 bg-[#EDE7E7] rounded-md p-5 shadow-md text-[#F44336] font-semibold" required
                        name="dedication" id="dedication" cols="30" rows="3" placeholder="Happy Birthday!!"></textarea>

                    <div class="mt-2 flex items-center justify-start w-fit">
                        <label for="quantity" class="font-bold">Quantity:</label>
                        <div class="mx-5 flex shadow-md cursor-pointer w-fit rounded-md overflow-hidden border ">
                            <div class="w-10 h-10 text-[#F44336] font-mono text-3xl font-bold text-center bg-white hover:text-2xl active:text-3xl select-none" id="minus-quantity">&minus;</div>
                            <input class="w-14 h-10 bg-[#EDE7E7] text-[#F44336] font-bold font-mono text-xl pl-4 text-center inline-block" readonly type="number" id="quantity" name="quantity" value="1" min="1" max="99">
                            <div class="w-10 h-10 text-[#F44336] font-mono text-3xl font-bold text-center bg-white hover:text-2xl active:text-3xl select-none" id="plus-quantity">&plus;</div>
                        </div>
                    </div>
                    <input required type="hidden" name="cake_id" autocomplete="off" value="{{ $cake['id'] }}">
                    <div class="flex justify-center gap-5 mt-10">
                        <x-nav-link :isButton='true' type='button' id='submit-buy' >
                            BUY NOW
                        </x-nav-link>
                        @if (!Auth::check() || !Auth::user()->is_admin)
                            <x-nav-link :isButton='true' type='button' id="submit-cart">
                                <div class="flex">
                                    <svg
                                        class="inline-block w-5 h-5  m-auto"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512">
                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            fill="#ffffff"
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                    <div>
                                        &nbsp; ADD TO CART
                                    </div>
                                </div>
                            </x-nav-link>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-gray-50 w-full p-20 max-h-[2000px] overflow-auto" id="ratingAndReviews">

            @auth
                @php
                    $hasOrder = Auth::user()->orders()
                        ->where('status', 'completed')
                        ->whereHas('orderItems', function ($query) use ($cake) {
                            $query->where('cake_id', $cake->id);
                        })
                        ->exists();

                    // $hasMyReview = Auth::user()->reviews()->where('cake_id', $cake->id)->exists();
                    $myReview = Auth::user()->reviews()->where('cake_id', $cake->id)->first();
                @endphp
                @if ($hasOrder)
                    <div class="mb-20">
                        <div class="text-red-500 font-bold border-red-500 flex gap-10">
                            <div>Your Review</div>
                            <div id="update-review-btn" class="text-blue-500 underline text-base font-normal cursor-pointer {{ $myReview ? '':'hidden' }}">EDIT</div>
                        </div>
                        @if ($myReview)
                            <x-feedback :review="$myReview"></x-feedback>
                            <x-review-update :myReview="$myReview"></x-review-update>
                        @else
                            <div id="create-review-btn" class="m-5 font-semibold text-sm py-2 px-5 border text-white cursor-pointer bg-red-500 hover:bg-red-600 active:scale-95 shadow-md w-fit rounded-md">Write a review.</div>
                            <x-review-create :cake_id="$cake->id"></x-review-create>
                        @endif
                    </div>
                @endif
            @endauth

            <div class="flex justify-center">
                <div class="text-red-500 font-bold border-b-2 border-red-500">Ratings and reviews</div>
            </div>

            @foreach ($reviews as $review)
                <x-feedback :review="$review"></x-feedback>
            @endforeach

            {{-- @empty($review)
                <div>nothing</div>
            @endempty --}}
            @if (count($reviews) == 0)
                <div class="p-10 text-center">No reviews yet. ;( <br>"Be the first to place an order and share your experience!"</div>
            @endif

            {{-- <div class="m-auto pt-10 underline text-center text-red-500">Read more reviews</div> --}}
            <br><br>
        </div>

    </div>

    <x-footer></x-footer>

    <div id="modal_confirmation" class="{{ $show_modal ? 'fixed':'hidden' }} inset-0 bg-black bg-opacity-50 w-screen h-screen z-50 overflow-auto">
        <div class="w-full h-full flex justify-center items-center">
            <div class="border shadow-md px-10 py-5 rounded-lg bg-[#ffdab9]">
                <div class="flex justify-end">
                    <button id="cancel" class="bg-red-500 hover:bg-[#D22115] aspect-square w-7 rounded-sm shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden">
                        <svg
                            class="aspect-square w-4 m-auto"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#fff" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                        </svg>
                    </button>
                </div>
                <div class="font-semibold text-2xl pt-5 pb-10 text-green-600">
                    Succesfully Added to Cart
                </div>
                <div class="flex justify-center gap-5">
                    <x-nav-link href='/cakes'>Explore</x-nav-link>
                    <x-nav-link href='/user/cart'>View Cart</x-nav-link>
                </div>
            </div>
        </div>
    </div>



    @session('success')
        <x-response-success>{{ session('success') }}</x-response-success>
    @endsession

    <script src="/js/cake_show_detail.js" defer></script>

</x-layout>
