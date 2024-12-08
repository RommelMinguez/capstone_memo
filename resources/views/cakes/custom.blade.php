<x-layout>

    <x-header></x-header>



<div id="customCake_form" class="w-full pt-20">
    <div class="w-full h-full flex justify-center py-10 overflow-auto">
        <div class="border shadow-md p-10 w-11/12 h-fit rounded-xl bg-[#FFEFF5]">
            {{-- message - close --}}
            <div id="cakeForm" class="">
                <div class="flex justify-between items-center">
                    <div class="font-bold text-xl">Make a Custom Cake Design Order</div>
                    {{-- <a href="/cakes" title="Close Create Form" class="cursor-pointer aspect-square w-7 rounded-full p-2 hover:bg-red-500 hover:fill-white fill-red-500">
                        <svg
                            class="w-full"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                        </svg>
                    </a> --}}
                </div>
                <br><br>

                <form id="custom_form" action="/cakes/custom" method="POST" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="ai_generated_image" value="" id="ai_generated_image">

                    <div class="flex gap-5 justify-evenly">
                        {{-- IMAGE INPUT --}}
                        <div id="imageCard" class="w-1/2 max-w-[700px] h-[800px] bg-gray-100 shadow-md border outline-dashed outline-4 -outline-offset-4 rounded-xl overflow-hidden flex justify-center items-center cursor-pointer relative group">

                            <div id="imageIcon" class="flex justify-center items-center flex-col gap-5 absolute inset-0 group-hover:flex">
                                <svg
                                    class="w-20"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#aaa" d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6l96 0 32 0 208 0c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                                </svg>
                                <div class="flex items-center gap-5">
                                    <div>
                                        <label for="imageInput">
                                            <span class="cursor-pointer bg-red-400 text-white p-2 rounded-md focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 hover:bg-red-500 shadow-sm border">
                                                Upload Photo
                                            </span>
                                        </label>
                                        <input id="imageInput" name="imageInput" type="file" class="hidden" accept="image/*" />
                                    </div>
                                    <div>
                                        <button id="ai-show-button" type="button" >
                                            <span class="cursor-pointer bg-red-400 text-white p-2 rounded-md focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 hover:bg-red-500 shadow-sm border">
                                                AI Design
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <img id="imagePreview" src="" alt="Uploaded Image Preview" class="hidden w-full h-full object-cover">
                        </div>
                        {{-- CAKE DETAILS INPUTS --}}
                        <div class="w-1/2 max-w-[700px]  bg-[#FEF6E4] shadow-md border p-5 rounded-sm overflow-auto">

                            <input id="name" name="name" type="text" title="Cake Name" placeholder="Cake Name" required class="p-2 mb-2 rounded-md shadow-sm shadow-gray-400 border bg-[#EDE7E7] w-full">

                            {{-- <input id="price" name="price" type="number" title="Price" placeholder="Budget" required class="p-2 mb-2 rounded-md shadow-sm shadow-gray-400 border bg-[#EDE7E7] w-36 mr-2">
                            <label for="price" class="font-semibold">PHP</label> --}}

                            <br><br>
                            <label for="description" class="font-semibold">DESCRIPTION:</label>
                            <textarea name="description" id="description" cols="30" rows="5" title="Cake Description" placeholder="type here..." required class="p-2 mb-2 rounded-md shadow-sm shadow-gray-400 border bg-[#EDE7E7] w-full"></textarea>

                            <br><br>

                            {{-- Personal Details Input --}}
                            <hr class="border-1 border-black shadow-md">
                            <br>
                            <div class="mt-7 ">
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
                            </div>
                        </div>
                    </div>

                    <br><br>
                    {{-- ADDITIONAL OPTION --}}
                    {{-- <div id="additionalOption">
                        <div class="flex justify-between px-5 cursor-pointer">
                            <div class="font-bold test-lg">
                                Additional Details <span class="text-gray-400 text-sm italic">(Optional)</span>
                            </div>
                            <div class="transition">
                                <svg
                                    class="w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="m-5 px-10 hidden">

                            <div>
                                <!-- additional image -->
                                <div class="my-5 ">

                                    <div class="flex items-center gap-5 my-2">
                                        <label for="image-upload" class="block w-fit text-sm font-semibold text-white py-1 px-4 bg-red-500 hover:bg-red-600 rounded-md cursor-pointer">Attach Images</label>
                                        <input id="image-upload"
                                            type="file"
                                            accept="image/*"
                                            multiple
                                            name="additional-image[]"
                                            class="hidden" />
                                        <div class="text-xs text-gray-500">You may upload up to 5 images showcasing different angles of the cake.</div>
                                    </div>

                                    <div id="preview" class="mt-4 flex flex-row gap-2 overflow-x-auto border-2 border-red-500 border-dashed p-5 min-h-24 min-w-24 rounded-lg w-fit">
                                        <svg
                                            id="preview-placeholder"
                                            class="w-24 fill-[#aaa]"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM323.8
                                            202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9
                                            25.4s12.4 13.6 21.6 13.6l96 0 32 0 208 0c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>


                            @foreach ($tagGroups as $category => $tags)
                                <div class="mb-5">
                                    <div>{{ $category }}</div>
                                    <div class="flex flex-wrap gap-2 py-2">
                                        @foreach ($tags as $tag)
                                            <x-cake-tag tagId="{{ $tag->id }}" tagName="selected-tag">{{ $tag->name }}</x-cake-tag>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div> --}}

                    {{-- CREATE BUTTON --}}
                    <div class="flex justify-end mt-10 mb-5 gap-5">
                        <button type="reset" class="px-5 py-2 rounded-md border shadow-md font-bold bg-white hover:bg-gray-100 active:scale-95">Reset</button>
                        <button id="custom-form-submit" type="button" class="px-5 py-2 rounded-md border bg-red-500 shadow-md text-white font-bold hover:bg-red-600 active:scale-95">SUBMIT DESIGN</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<x-cake-custom-ai :generatedImages="$generatedImages"></x-cake-custom-ai>


<script src="/js/cake_custom.js" defer></script>

</x-layout>
