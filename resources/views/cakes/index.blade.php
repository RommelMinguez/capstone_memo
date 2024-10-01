<x-layout>

    <x-header></x-header>

    <div class="container h-fit flex items-stretch justify-between my-20 px-20 relative ">
        {{-- SEARCH --}}
        <div class="w-10/12 ">
            <div class="flex justify-center align-middle gap-10 py-10">
                <div class="h-14 w-[500px] flex rounded-l-full rounded-r-full">
                    <form action="/cakes/search" method="GET" class="relative w-full">
                        <input type="text" name="cake" placeholder="Search cakes here..." value="{{ request('cake') }}"  maxlength="25" class="w-full h-full rounded-l-full rounded-r-full px-10">
                        <button class="absolute right-0 top-0  h-14 w-20 rounded-full bg-[#F44336]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 m-auto"
                                viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#fff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>

            {{-- CUSTOM DESIGN --}}

            @if (Auth::check() && !Auth::user()->is_admin)
                <div id="customCake_btn" class="flex items-center mb-10 px-10">
                    <x-nav-link href="#" >
                        <div class="flex">
                            <svg
                                class="inline-block w-5 h-5 m-auto"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#fff"  d="M86.4 5.5L61.8 47.6C58 54.1 56 61.6 56 69.2L56 72c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L105.6 5.5C103.6 2.1 100 0 96 0s-7.6 2.1-9.6 5.5zm128 0L189.8 47.6c-3.8 6.5-5.8 14-5.8 21.6l0 2.8c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L233.6 5.5C231.6 2.1 228 0 224 0s-7.6 2.1-9.6 5.5zM317.8 47.6c-3.8 6.5-5.8 14-5.8 21.6l0 2.8c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L361.6 5.5C359.6 2.1 356 0 352 0s-7.6 2.1-9.6 5.5L317.8 47.6zM128 176c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48c-35.3 0-64 28.7-64 64l0 71c8.3 5.2 18.1 9 28.8 9c13.5 0 27.2-6.1 38.4-13.4c5.4-3.5 9.9-7.1 13-9.7c1.5-1.3 2.7-2.4 3.5-3.1c.4-.4 .7-.6 .8-.8l.1-.1s0 0 0 0s0 0 0 0s0 0 0 0s0 0 0 0c3.1-3.2 7.4-4.9 11.9-4.8s8.6 2.1 11.6 5.4c0 0 0 0 0 0s0 0 0 0l.1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c3-3.5 7.4-5.4 12-5.4s9 2 12 5.4l.1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c2.9-3.4 7.1-5.3 11.6-5.4s8.7 1.6 11.9 4.8c0 0 0 0 0 0s0 0 0 0s0 0 0 0l.1 .1c.2 .2 .4 .4 .8 .8c.8 .7 1.9 1.8 3.5 3.1c3.1 2.6 7.5 6.2 13 9.7c11.2 7.3 24.9 13.4 38.4 13.4c10.7 0 20.5-3.9 28.8-9l0-71c0-35.3-28.7-64-64-64l0-48c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48-64 0 0-48c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48-64 0 0-48zM448 394.6c-8.5 3.3-18.2 5.4-28.8 5.4c-22.5 0-42.4-9.9-55.8-18.6c-4.1-2.7-7.8-5.4-10.9-7.8c-2.8 2.4-6.1 5-9.8 7.5C329.8 390 310.6 400 288 400s-41.8-10-54.6-18.9c-3.5-2.4-6.7-4.9-9.4-7.2c-2.7 2.3-5.9 4.7-9.4 7.2C201.8 390 182.6 400 160 400s-41.8-10-54.6-18.9c-3.7-2.6-7-5.2-9.8-7.5c-3.1 2.4-6.8 5.1-10.9 7.8C71.2 390.1 51.3 400 28.8 400c-10.6 0-20.3-2.2-28.8-5.4L0 480c0 17.7 14.3 32 32 32l384 0c17.7 0 32-14.3 32-32l0-85.4z"/>
                            </svg>
                            <div>
                                &nbsp; CUSTOM CAKE ORDER
                            </div>
                        </div>
                    </x-nav-link>
                </div>

            @endif


            <hr><br>


            {{-- CATALOG --}}
            <div class="flex flex-wrap justify-evenly gap-10 ">

                @if ($cakes->isEmpty())
                    <p>No cakes found matching your search.</p>
                @endif

                @foreach ($cakes as $cake)
                    <x-cake-card :cake="$cake">
                    </x-cake-card>
                @endforeach
            </div>


            <div class="my-20 px-20">{{ $cakes->links() }}</div>
        </div>

        {{-- RIGHT NAV --}}
        <div class="py-20 ">
            <ol class="flex text-right flex-col justify-end gap-5 text-[#F44336] text-lg font-semibold sticky top-36">
                <li><a href="#">Birthday</a></li>
                <li><a href="#">Anniversary</a></li>
                <li><a href="#">Wedding</a></li>
                <li><a href="#">Graduation</a></li>
                <li><a href="#">Holiday</a></li>
            </ol>
        </div>
    </div>



    <x-footer></x-footer>

    <x-cake-custom :tagGroups="$tagGroups"></x-cake-custom>


    <script>

        // SHOW AND HIDE CUSTOM CAKE FORM
        let btn_customCake = document.getElementById('customCake_btn');
        let form_customCake = document.getElementById('customCake_form');
        let btn_closeCreateForm = document.getElementById('closeCreate');

        if (btn_customCake) {
            btn_customCake.addEventListener('click', function() {
                document.body.style.overflow = 'hidden';
                form_customCake.classList.remove('hidden');
            });
        }

        btn_closeCreateForm.addEventListener('click', function() {
            document.body.style.overflow = 'auto';
            form_customCake.classList.add('hidden');
        });

        // CUSTOM FORM IMAGE PREVIEW
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

        // CUSTOM CAKE ADDITIONAL OPTION
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
