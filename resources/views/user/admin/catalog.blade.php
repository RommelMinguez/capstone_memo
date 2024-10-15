<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class=" w-5/6">
            <form action="/admin/catalog/search" method="GET" class="relative">
                <div class="bg-[#ffdab9] shadow-md  pt-24 px-10 pb-4">
                    <div class="flex justify-between items-center">
                        <div class="font-bold text-xl">Manage Cakes</div>
                        <div class="flex gap-5 text-sm">
                            <div class="relative">
                                <input type="text" name="cake" maxlength="255" value="{{ request()->cake }}" class="w-80 p-2 rounded-md border shadow-md" placeholder="Search Here...">
                                <button>
                                    <svg
                                        class="w-5 absolute right-3 top-2"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                                    </svg>
                                </button>
                            </div>
                            <div id="filter-show" class="font-semibold flex items-center gap-1 hover:text-red-500 hover:fill-red-500 hover:underline  cursor-pointer ">
                                <svg
                                    class="w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M3.9 54.9C10.5 40.9 24.5 32 40 32l432 0c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9 320 448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6l0-79.1L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/>
                                </svg>
                                <span>Filter</span>
                            </div>
                            {{-- <div class="font-semibold flex items-center gap-1 hover:text-red-500 hover:fill-red-500 hover:underline  cursor-pointer ">
                                <svg
                                    class="w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8l256 0c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/>
                                </svg>
                                <span>Sort</span>
                            </div> --}}
                            <button id="addNew" type="button" class="p-2 rounded-md bg-[#F55447] text-white shadow-md font-semibold hover:bg-red-500 active:scale-95 flex items-center gap-2">
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
                <div id="filter-content" class="bg-[#ffdab9] border-t-2 shadow-md p-10 hidden">
                    <div class="w-full flex">
                        <div class="w-3/4">
                            @foreach ($tagGroups as $category => $tags)
                                <div class="mb-5">
                                    <div class="font-semibold">{{ $category }}</div>
                                    <div class="flex flex-wrap gap-2 py-2">
                                        @foreach ($tags as $tag)
                                            <x-cake-tag tagId="{{ $tag->id }}" tagName="selected-tag">{{ $tag->name }}</x-cake-tag>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="w-1/4 px-5">
                            <div class="font-semibold"> SORT BY</div>
                            <div class="flex flex-col gap-3 p-5">
                                <label>
                                    <input checked type="radio" name="sort" class="mr-3 w-3 h-3" value="latest"> Latest
                                </label>
                                <label>
                                    <input {{ request('sort') == 'alphabetical' ? 'checked':'' }} type="radio" name="sort" class="mr-3 w-3 h-3" value="alphabetical"> Alphabetical
                                </label>
                                <label>
                                    <input {{ request('sort') == 'rating' ? 'checked':'' }} type="radio" name="sort" class="mr-3 w-3 h-3" value="rating"> Rating
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="py-2 px-5 bg-red-500 rounded-md shadow-md font-semibold text-white hover:bg-red-600 active:scale-95">Apply</button>
                    </div>
                </div>
            </form>

            {{-- BUTTONS --}}


            {{-- CATALOG --}}
            <div class="bg-[#FFEFF5] rounded-lg shadow-md shadow-gray-500 m-5 p-10">

                @isset($selectedTags)
                    @if (!$selectedTags->isEmpty())
                        <div class="mb-5 flex items-center gap-3">
                            <div class="font-semibold">Search Tag:</div>
                            <div class="flex flex-wrap gap-2 py-2">
                            @foreach ($selectedTags as $tag)
                                <x-cake-tag tagId="{{ $tag->id }}" tagName="search-tag" :checked="true">{{ $tag->name }}</x-cake-tag>
                            @endforeach
                            </div>
                        </div>
                    @endif
                @endisset

                <br>

                <div class=" flex flex-wrap justify-center gap-10">

                    @if ($cakes->isEmpty())
                        <p>No cakes found matching your search.</p>
                    @endif

                    @foreach ($cakes as $cake)
                        <x-cake-card-catalog :cake="$cake"></x-cake-card-catalog>
                    @endforeach
                </div>
                <div class="my-20 px-20">{{ $cakes->links() }}</div>

                <br><br>

            </div>

        </main>
    </div>


    <x-cake-create :tagGroups="$tagGroups"></x-cake-create>
    <x-cake-delete-confirmation></x-cake-delete-confirmation>
    <x-cake-update :tagGroups="$tagGroups"></x-cake-update>

    @session('success')
        <x-response-success>{{ session('success') }}</x-response-success>
    @endsession
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <x-response-failed>{{ $error }}</x-response-failed>
        @endforeach
    @endif

    <script src="/js/catalog.js" defer></script>

</x-layout>
