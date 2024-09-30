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

            {{-- BUTTONS --}}


            {{-- CATALOG --}}
            <div class="bg-[#FFEFF5] rounded-lg shadow-md shadow-gray-500 m-5 p-10">
                <div class=" flex flex-wrap justify-center gap-10">
                    @foreach ($cakes as $cake)
                        <x-cake-card :cake="$cake" size="small"></x-cake-card>
                    @endforeach
                </div>
                <div class="my-20 px-20">{{ $cakes->links() }}</div>

                <br><br>

            </div>

        </main>
    </div>


    <x-cake-create :tagGroups="$tagGroups"></x-cake-create>

    @session('success')
        <x-response-success>{{ session('success') }}</x-response-success>
    @endsession
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <x-response-failed>{{ $error }}</x-response-failed>
        @endforeach
    @endif

    <script>


        let createForm = document.getElementById('createForm');
        let showCreateForm = document.getElementById('addNew');
        let closeCreateForm = document.getElementById('closeCreate');
        // let closeEditTags = document.getElementById('closeEditTags');
        // let returnEditTags = document.getElementById('returnEditTags');
        // let showEditForm = document.getElementById('showEditForm');
        // let editTagForm = document.getElementById('editTagForm');
        let cakeForm = document.getElementById('cakeForm');

        showCreateForm.addEventListener('click', function() {
            document.body.style.overflow = 'hidden';
            createForm.classList.remove('hidden');
        });
        closeCreateForm.addEventListener('click', function() {
            document.body.style.overflow = 'auto';
            createForm.classList.add('hidden');
        });


        // CREATE FORM IMAGE PREVIEW
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const imageIcon = document.getElementById('imageIcon');
        //const imageCard = document.getElementById('imageCard');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.src = event.target.result;
                    imagePreview.classList.remove('hidden');

                    imageIcon.classList.add('hidden');
                    imageIcon.classList.add('bg-black', 'bg-opacity-70');
                    imageIcon.children[0].classList.add('hidden');
                    imageIcon.children[1].children[0].textContent = 'Change Image';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.classList.add('hidden');

                imageIcon.classList.remove('hidden');
                imageIcon.classList.remove('bg-black', 'bg-opacity-50');
                imageIcon.children[0].classList.remove('hidden');
                imageIcon.children[1].children[0].textContent = 'Upload Image';

            }
        });

        // ADDITIONAL OPTION
        let additionalOption = document.getElementById('additionalOption');

        additionalOption.children[0].addEventListener('click', function() {
            if (additionalOption.children[1].classList.contains('hidden')) {
                this.children[1].classList.add('-rotate-90');
                additionalOption.children[1].classList.remove('hidden');
            } else {
                this.children[1].classList.remove('-rotate-90');

                additionalOption.children[1].classList.add('hidden');
                // additionalOption.children[1].classList.('translate-y-0');
            }
        });
    </script>

</x-layout>
