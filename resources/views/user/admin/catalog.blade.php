<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class=" w-5/6">
            <div class="bg-[#ffdab9] shadow-md  pt-24 px-10 pb-4">
                <div class="flex justify-between items-center">
                    <div class="font-bold text-xl">Cake Catalog</div>
                    <div class="flex gap-5 text-sm">
                        <input type="text" class="w-80 p-2 rounded-md border shadow-md" placeholder="Search Here...">
                        <div class="font-semibold flex items-center gap-1 hover:text-red-500 hover:fill-red-500 hover:underline  cursor-pointer ">
                            <svg
                                class="w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/>
                            </svg>
                            <span>Filter</span>
                        </div>
                        <div class="font-semibold flex items-center gap-1 hover:text-red-500 hover:fill-red-500 hover:underline  cursor-pointer ">
                            <svg
                                class="w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8l256 0c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/>
                            </svg>
                            <span>Sort</span>
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
                </div>
            </div>

            {{-- BUTTONS --}}


            {{-- CATALOG --}}
            <div class="bg-[#FFEFF5] rounded-lg shadow-md shadow-gray-500 m-5 p-10">
                <div class=" flex flex-wrap justify-center gap-10">
                    @foreach ($cakes as $cake)
                        <x-cake-card :cake="$cake" size="small"></x-cake-card>
                    @endforeach
                </div>
                <div class="my-20 px-20">{{ $cakes->links() }}</div>
            </div>

        </main>
    </div>


    <div id="addNew" class="fixed inset-0 bg-black bg-opacity-50 w-screen h-screen z-50 overflow-auto">
        <div class="w-full h-full flex justify-center pt-10">
            <div class="border shadow-md p-5 w-[900px] rounded-md bg-[#FFEFF5]">
                {{-- message - close --}}
                <div class="flex justify-between items-center">
                    <div class="font-bold">Add New Cake</div>
                    <div>
                        <svg
                            class="w-3"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ff0000" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                        </svg>
                    </div>
                </div>
                <br><br>
                {{-- input --}}
                <form action="">
                    <div class="flex gap-5">
                        <div class="w-1/2 bg-gray-100 shadow-sm border p-5 outline-dashed outline-4 -outline-offset-4 rounded-xl flex justify-center items-center flex-col gap-5">
                            <svg
                                class="w-20"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#aaa" d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6l96 0 32 0 208 0c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                            </svg>
                            <div class="flex items-center">
                                <label for="photo-upload" class="cursor-pointer bg-red-400 text-white p-2 rounded-md focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 hover:bg-red-500 shadow-sm border">
                                    Upload Photo
                                </label>
                                <input id="photo-upload" type="file" class="hidden" accept="image/*" />
                            </div>
                        </div>
                        <div class="w-1/2 h-[500px] bg-[#FEF6E4] shadow-sm border p-5 rounded-sm overflow-auto">

                            <input id="name" name="name" type="text" placeholder="Cake Name..." class="p-2 mb-2 rounded-md shadow-sm border bg-[#EDE7E7] text-xl w-full font-serif font-semibold">

                            <input id="price" name="price" type="number" placeholder="500.00" class="p-2 mb-2 rounded-md shadow-sm border bg-[#EDE7E7] w-32 mr-2">
                            <label for="price" class="font-semibold">PHP</label>

                            <br><br>
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="p-2 mb-2 rounded-md shadow-sm border bg-[#EDE7E7] w-full"></textarea>

                            <div class="my-2">Event / Category</div>
                            <div class="flex gap-1 flex-wrap">
                                @for($i = 0; $i < 10; $i++)
                                    <label for="event-tag{{ $i }}" class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white py-1 px-3 text-sm cursor-pointer rounded-full">
                                        <input type="checkbox" name="event-tag[]" id="event-tag{{ $i }}" class="appearance-none">
                                        Birthday
                                    </label>
                                @endfor
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
