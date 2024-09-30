<x-layout :useDatatableCDN="true" :category="$categoryArr">

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="w-5/6">

            <div class="bg-[#ffdab9] shadow-md pt-24 px-10 pb-4  flex justify-between">
                <div class="font-bold text-xl flex items-end">
                    <span>Manage Tags</span>

                </div>
                <button id="showCreateTag" type="button" class="p-2 rounded-md bg-[#F55447] text-white shadow-md font-semibold hover:bg-red-500 active:scale-95 flex items-center gap-2">
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

            <div class="p-5 flex flex-wrap">


                @foreach ($categories as $category => $tags)
                    <div class="p-5 w-1/2">
                        <div class="bg-[#FFEFF5] rounded-lg h-fit shadow-md shadow-gray-500 p-3">

                            <div class="flex justify-between">
                                <div class="font-bold px-5 text-lg mb-5">{{ $category }}</div>
                            </div>

                            <div class="bg-gray-100 rounded-xl border shadow-md p-3">
                                <table id="{{ $category }}" class="display border-collapse w-full table-fixed">
                                    <thead>
                                        <tr class="border-y-2">
                                            <th class=" w-auto">Tag Name</th>
                                            <th class=" w-auto">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tags as $tag)
                                            <tr class="tagData h-10"
                                                data-id="{{ $tag->id }}"
                                                data-name="{{ $tag->name }}"
                                                data-category="{{ $tag->category }}">
                                                <td class="cursor-pointer text-center">
                                                    <x-cake-tag tagId="{{ $tag->id }}" tagName="tag">{{ $tag->name }}</x-cake-tag>
                                                </td>
                                                <td class="text-center">
                                                    <button class="tagEdit py-1 px-3 text-xs text-white bg-blue-500 rounded-md shadow-md mr-2 hover:bg-blue-600 active:scale-95">
                                                        EDIT
                                                    </button>
                                                    <button class="tagDelete py-1 px-3 text-xs text-white bg-red-500 rounded-md shadow-md mr-2 hover:bg-red-600 active:scale-95">
                                                        DELETE
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>


        </main>
    </div>

    <x-tag-create :categories="$categories"></x-tag-create>

    <x-tag-edit :categories="$categories"></x-tag-edit>

    <x-tag-delete></x-tag-delete>

    @session('success')
        <x-response-success>{{ session('success') }}</x-response-success>
    @endsession
    @error('tag_name')
        <x-response-failed>{{ $message }}</x-response-failed>
    @enderror
    @error('edit_name')
        <x-response-failed>{{ $message }}</x-response-failed>
    @enderror



    <script>
        let tagCreateForm = document.getElementById('tagCreateForm');
        let closeTagCreate = document.getElementById('closeCreate');
        let showTagCreate = document.getElementById('showCreateTag');
        closeTagCreate.addEventListener('click', function() {
            tagCreateForm.classList.add('hidden');
        });
        showTagCreate.addEventListener('click', function() {
            tagCreateForm.classList.remove('hidden');
        })

        // TAG DATA
        let tagData = document.querySelectorAll('.tagData');
        let tagArr = [];
        tagData.forEach((element, index) => {
            tagArr[index] = [
                element.dataset.id,
                element.dataset.name,
                element.dataset.category
            ];
        })

        // TAG EDIT
        let tagEdit = document.querySelectorAll('.tagEdit');

        tagEdit.forEach((element, index) => {
            element.addEventListener('click', function() {
               tagEditForm.classList.remove('hidden');
                editNameInp.value = tagArr[index][1];
                editCategoryInp.value = tagArr[index][2];
                editIdInp.value = tagArr[index][0];

            });
        });

        let tagEditForm = document.getElementById('tagEditForm');
        let closeEdit = document.getElementById('closeEdit');
        let editNameInp = document.getElementById('edit_name');
        let editCategoryInp = document.getElementById('edit_category');
        let editIdInp = document.getElementById('edit_id');
        closeEdit.addEventListener('click', function() {
            tagEditForm.classList.add('hidden');
        });


        // TAG DELETE
        let tagDelete = document.querySelectorAll('.tagDelete');
        let tagDeleteForm = document.getElementById('tagDeleteForm');
        let closeDelete = document.getElementById('closeDelete');
        let cancelDelete = document.getElementById('cancelDelete');
        let deleteID = document.getElementById('delete_id');
        tagDelete.forEach((element, index) => {
            element.addEventListener('click', function() {
                tagDeleteForm.classList.remove('hidden');
                deleteID.value = tagArr[index][0];
            });
        });
        closeDelete.addEventListener('click', function() {
            tagDeleteForm.classList.add('hidden');
        })
        cancelDelete.addEventListener('click', function() {
            tagDeleteForm.classList.add('hidden');
        })


    </script>

</x-layout>
