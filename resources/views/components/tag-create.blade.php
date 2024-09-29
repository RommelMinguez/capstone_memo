@props(['categories'])

<div id="tagCreateForm" class="fixed hidden inset-0 h-screen w-screen bg-opacity-60 bg-black z-50">
    <div class="flex h-full justify-center items-center">
        <form action="/admin/tags" method="POST">

            @csrf

            <div class="p-5 bg-[#FEF6E4] rounded-xl border shadow-md">
                <div class="flex justify-between items-center">
                    <div class="font-bold">Add New Tag</div>
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

                <hr><br>

                <div class="flex justify-between items-center gap-10 pb-5">
                    <label for="tag_name" class="">Tag Name:</label>
                    <input type="text" id="tag_name" name="tag_name" required placeholder="Birthday" class="p-2 border rounded-md shadow-sm w-60">
                </div>
                <div class="flex justify-between items-center gap-10 pb-10">
                    <label for="tag_category" class="">Category:</label>
                    <input type="text" list="categories" id="tag_category" name="tag_category" required placeholder="Event" class="p-2 border rounded-md shadow-sm w-60">

                    <datalist id="categories">
                        @foreach ($categories as $category)
                            <option value="{{ $category->category }}">
                        @endforeach
                    </datalist>
                </div>

                <div class="flex justify-end">
                    <button class="py-2 px-5 text-white font-semibold border rounded-md bg-red-500 shadow-sm hover:bg-red-600 active:scale-95">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
