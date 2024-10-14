@props(['tagGroups'])

<div id="createForm" class="hidden fixed inset-0 bg-black bg-opacity-50 w-screen h-screen z-50 overflow-auto">
    <div class="w-full h-full flex justify-center py-10 overflow-auto">
        <div class="border shadow-md p-5 w-[900px] h-fit rounded-md bg-[#FFEFF5]">
            {{-- message - close --}}
            <div id="cakeForm" class="">
                <div class="flex justify-between items-center">
                    <div class="font-bold">Add New Cake</div>
                    <div id="closeCreate" title="Close Create Form" class="cursor-pointer aspect-square w-7 rounded-full p-2 hover:bg-red-500 hover:fill-white fill-red-500">
                        <svg
                            class="w-full"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                        </svg>
                    </div>
                </div>
                <br><br>

                <form action="/admin/catalog" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="flex gap-5">
                        {{-- IMAGE INPUT --}}
                        <div id="imageCard" class="w-1/2 h-[600px] bg-gray-100 shadow-md border outline-dashed outline-4 -outline-offset-4 rounded-xl overflow-hidden flex justify-center items-center cursor-pointer relative group">

                            <div id="imageIcon" class="flex justify-center items-center flex-col gap-5 absolute inset-0 group-hover:flex">
                                <svg
                                    class="w-20"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#aaa" d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6l96 0 32 0 208 0c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                                </svg>
                                <div class="flex items-center">
                                    <label for="imageInput" class="cursor-pointer bg-red-400 text-white p-2 rounded-md focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 hover:bg-red-500 shadow-sm border pointer-events-auto">
                                        Upload Photo
                                    </label>
                                    <input id="imageInput" name="imageInput" type="file" required class="absolute bottom-0 left-0 -z-10" accept="image/*" />
                                </div>
                            </div>

                            <img id="imagePreview" src="" alt="Uploaded Image Preview" class="hidden w-full h-full object-cover">
                        </div>
                        {{-- CAKE DETAILS INPUTS --}}
                        <div class="w-1/2  bg-[#FEF6E4] shadow-md border p-5 rounded-sm overflow-auto">

                            <input id="name" name="name" type="text" title="Cake Name" placeholder="Chiffon Cake" required class="p-2 mb-2 rounded-md shadow-sm shadow-gray-400 border bg-[#EDE7E7] w-full">

                            <input id="price" name="price" type="number" step="0.01" title="Price" placeholder="500.00" required class="p-2 mb-2 rounded-md shadow-sm shadow-gray-400 border bg-[#EDE7E7] w-32 mr-2">
                            <label for="price" class="font-semibold">PHP</label>

                            <br><br>
                            <label for="description" class="font-semibold">DESCRIPTION:</label>
                            <textarea name="description" id="description" cols="30" rows="5" title="Cake Description" placeholder="type here..." required class="p-2 mb-2 rounded-md shadow-sm shadow-gray-400 border bg-[#EDE7E7] w-full"></textarea>

                            <br><br>
                            <div class="mb-3 flex justify-between items-end">
                                <div class="font-semibold">EVENTS:</div>
                            </div>
                            <div class="flex gap-2 flex-wrap">
                                @foreach ($tagGroups as $category => $tags)
                                    @if ($category == 'EVENT')
                                        @foreach ($tags as $tag)
                                            <x-cake-tag tagId="{{ $tag->id }}" tagName="attached-tag">{{ $tag->name }}</x-cake-tag>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <br><br>
                    {{-- ADDITIONAL OPTION --}}
                    <div id="additionalOption">
                        <div class="flex justify-between px-5 cursor-pointer">
                            <div class="font-bold test-lg">
                                Additional Details
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

                            @foreach ($tagGroups as $category => $tags)
                                @if ($category != 'EVENT')
                                    <div class="mb-5">
                                        <div>{{ $category }}</div>
                                        <div class="flex flex-wrap gap-2 py-2">
                                            @foreach ($tags as $tag)
                                                <x-cake-tag tagId="{{ $tag->id }}" tagName="attached-tag">{{ $tag->name }}</x-cake-tag>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                    {{-- CREATE BUTTON --}}
                    <div class="flex justify-end mt-10 mb-5 gap-5">
                        <button id="reset-button" type="reset" class="px-5 py-2 rounded-md border shadow-md font-bold bg-white hover:bg-gray-100 active:scale-95">Cancel</button>
                        <button type="submit" class="px-5 py-2 rounded-md border bg-red-500 shadow-md text-white font-bold hover:bg-red-600 active:scale-95">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
