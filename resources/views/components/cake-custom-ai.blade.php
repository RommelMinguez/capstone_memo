@props([
    'generatedImages'
])

<div id="ai-content" class=" fixed inset-0 bg-black bg-opacity-50 w-screen h-screen z-50 overflow-auto hidden">
    <div class="w-full h-full flex justify-center py-10 overflow-auto">
        <div class="border shadow-md p-5 w-[900px] h-fit rounded-md bg-[#FFEFF5]">
            <div  class="">
                {{-- message - close --}}
                <div class="flex justify-between items-center">
                    <div class="font-bold text-xl">Generate AI Design</div>
                    <div id="ai-close-button" title="Close Create Form" class="cursor-pointer aspect-square w-7 rounded-full p-2 hover:bg-red-500 hover:fill-white fill-red-500">
                        <svg
                            class="w-full"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                        </svg>
                    </div>
                </div>
                <hr><br>

                {{-- prompt --}}
                <div class="flex rounded-xl border bg-white relative shadow-sm w-full hover:shadow-md justify-between items-end p-2 gap-2">
                    <div class="max-h-20 overflow-auto pl-5 w-full py-2">
                        <div contenteditable="true" id="prompt-textarea" class="w-full focus:outline-none placeholder"></div>
                    </div>
                    <button id="prompt-generate-btn" class="h-10 w-10 rounded-full bg-red-300 border">
                        <svg
                            class="w-4 m-auto fill-white"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2 160 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-306.7L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-400 mt-1 px-5 text-center">Please provide a detailed cake description here. <br> The more specific the information, the more accurately the generated image will reflect your vision.</p>



                <br><br>

                {{-- AI RESULT --}}
                <div class="font-semibold text-lg">
                    Your Creation
                </div>
                <div class="flex flex-wrap gap-y-5 justify-evenly" id="prompt-result">

                    <div>No design generated yet.</div>

                    <div id="prompt-result-pollinations" class="w-1/3 p-5 hidden">
                        <div class="font-semibold mb-2 text-center">pollinations.ai</div>
                        <div class="loading-box w-full h-72 rounded-lg overflow-hidden">
                            <img src="" alt="" class="object-cover h-full cursor-pointer generated-recent" id="generated-pollinationsAI">
                        </div>
                    </div>
                    <div id="prompt-result-horde" class="w-1/3 p-5 hidden">
                        <div class="font-semibold mb-2 text-center">AI Horde</div>
                        <div class="loading-box w-full h-72 rounded-lg overflow-hidden">
                            <img src="" alt="" class="object-cover h-full cursor-pointer generated-recent" id="generated-hordeAI">
                        </div>
                    </div>

                </div>


                <br><br><hr class="border-b-2 border-white"><br><br>

                {{-- PREVIOUS PROMPT --}}
                <div class="font-semibold text-lg">
                    Recent Designs by Customers
                </div>
                <div class="flex flex-wrap gap-y-2">
                    @foreach ($generatedImages as $image)
                        <div class="w-1/4 p-2">
                            <div class="w-full h-60 rounded-lg overflow-hidden relative group">
                                <img src="{{ Storage::url($image->path) }}" data-id="{{ $image->id }}" alt="generated images" class="object-cover h-full generated-recent cursor-pointer">
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Use this Design</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
