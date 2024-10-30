<nav class="min-w-[300px] w-1/6 min-h-screen bg-white pt-28 shadow-lg shadow-gray-800 relative z-30 hidden md:block">
    <div class="pb-2 border-b-2 mb-5">
        <a href="/user/info">
            <div class="w-28 h-28 rounded-full border shadow-sm m-auto group relative overflow-hidden">
                <img src="{{ Storage::url(Auth::user()->image_src) }}" alt="Profile Picture" class="w-full h-full object-cover rounded-full">
                <div class="hidden justify-center items-center w-full h-full bg-black opacity-90 group-hover:flex absolute inset-0">
                    <svg
                        class="w-10 fill-white"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144
                        144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                    </svg>
                </div>
            </div>
        </a>
        <br>

        @if (!Auth::user()->is_admin)
            <br>
            <div class="text-center font-semibold text-2xl mb-8">{{ Str::upper(Auth::user()->first_name). ' '. Str::upper(Auth::user()->last_name) }}</div>
        @endif

    </div>
    <div class="sticky top-24 overflow-auto">


        {{-- SIDE NAV FOR CUSTOMERS --}}
        @if (!Auth::user()->is_admin)

            <ol>
                <a href="/user">
                    <li class="{{ request()->is('user') ? 'bg-[#D9D9D9] font-bold border-l-4 pl-9 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex items-center gap-5">
                        <svg
                            class="aspect-square h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                        </svg>
                        <div>Track Orders</div>
                    </li>
                </a>

                <a href="/user/custom-order">
                    <li class="{{ request()->is('user/custom-order') ? 'bg-[#D9D9D9] font-bold border-l-4 pl-9 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex items-center gap-5">
                        <svg
                            class="w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path  d="M86.4 5.5L61.8 47.6C58 54.1 56 61.6 56 69.2L56 72c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L105.6 5.5C103.6 2.1 100 0 96 0s-7.6 2.1-9.6 5.5zm128 0L189.8 47.6c-3.8 6.5-5.8 14-5.8 21.6l0 2.8c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L233.6 5.5C231.6 2.1 228 0 224 0s-7.6 2.1-9.6 5.5zM317.8 47.6c-3.8 6.5-5.8 14-5.8 21.6l0 2.8c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L361.6 5.5C359.6 2.1 356 0 352 0s-7.6 2.1-9.6 5.5L317.8 47.6zM128 176c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48c-35.3 0-64 28.7-64 64l0 71c8.3 5.2 18.1 9 28.8 9c13.5 0 27.2-6.1 38.4-13.4c5.4-3.5 9.9-7.1 13-9.7c1.5-1.3 2.7-2.4 3.5-3.1c.4-.4 .7-.6 .8-.8l.1-.1s0 0 0 0s0 0 0 0s0 0 0 0s0 0 0 0c3.1-3.2 7.4-4.9 11.9-4.8s8.6 2.1 11.6 5.4c0 0 0 0 0 0s0 0 0 0l.1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c3-3.5 7.4-5.4 12-5.4s9 2 12 5.4l.1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c2.9-3.4 7.1-5.3 11.6-5.4s8.7 1.6 11.9 4.8c0 0 0 0 0 0s0 0 0 0s0 0 0 0l.1 .1c.2 .2 .4 .4 .8 .8c.8 .7 1.9 1.8 3.5 3.1c3.1 2.6 7.5 6.2 13 9.7c11.2 7.3 24.9 13.4 38.4 13.4c10.7 0 20.5-3.9 28.8-9l0-71c0-35.3-28.7-64-64-64l0-48c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48-64 0 0-48c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48-64 0 0-48zM448 394.6c-8.5 3.3-18.2 5.4-28.8 5.4c-22.5 0-42.4-9.9-55.8-18.6c-4.1-2.7-7.8-5.4-10.9-7.8c-2.8 2.4-6.1 5-9.8 7.5C329.8 390 310.6 400 288 400s-41.8-10-54.6-18.9c-3.5-2.4-6.7-4.9-9.4-7.2c-2.7 2.3-5.9 4.7-9.4 7.2C201.8 390 182.6 400 160 400s-41.8-10-54.6-18.9c-3.7-2.6-7-5.2-9.8-7.5c-3.1 2.4-6.8 5.1-10.9 7.8C71.2 390.1 51.3 400 28.8 400c-10.6 0-20.3-2.2-28.8-5.4L0 480c0 17.7 14.3 32 32 32l384 0c17.7 0 32-14.3 32-32l0-85.4z"/>
                        </svg>
                        <div>Track Custom Orders</div>
                    </li>
                </a>

                <a href="/user/message">
                    <li class="{{ request()->is('user/message') ? 'bg-[#D9D9D9] font-bold border-l-4 pl-9 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex items-center gap-5">
                        <svg
                            class="aspect-square h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9l.3-.5z"/>
                        </svg>
                        <div>Message</div>
                    </li>
                </a>
                {{-- <li class="hover:bg-[rgb(217,217,217)] px-10 py-3 font-semibold">Custom Design</li> --}}

            </ol>

        @else
            {{-- SIDE NAV FOR ADMIN --}}
            <ul>
                <a href="/admin">
                    <li class="{{ request()->is('admin') ? 'bg-[#D9D9D9] font-bold border-l-4 pl-9 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex items-center gap-5">
                        <svg
                            class="aspect-square h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                        </svg>
                        <div>Dashboard</div>
                    </li>
                </a>

                <a href="/admin/orders?filter=pending">
                    <li class="{{ request()->is('admin/orders') ? 'bg-[#D9D9D9] font-bold border-l-4 pl-9 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex items-center gap-5">
                        <svg
                            class="aspect-square h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                        </svg>
                        <div>Manage Orders</div>
                    </li>
                </a>

                <a href="/admin/custom">
                    <li class="{{ request()->is('admin/custom') ? 'bg-[#D9D9D9] font-bold border-l-4 pl-9 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex items-center gap-5">
                        <svg
                            class="aspect-square h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                        </svg>
                        <div>Manage Custom Orders</div>
                    </li>
                </a>

                <br><hr class="border-b-2 mb-2">

                {{-- CAKE CATALOG --}}
                <li id="catalog" class="{{ (request()->is('admin/catalog*') || request()->is('admin/tags') || request()->is('admin/candle')) ? 'bg-[#eaeaea] font-bold border-l-4 pl-9 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex items-center justify-between cursor-pointer">
                    <a href="/admin/catalog" class="flex items-center gap-5">
                        <svg
                            class="aspect-square h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                        </svg>
                        <div>Cake Catalog</div>
                    </a>
                    <div id="catalog_rotate" class="transition {{ (request()->is('admin/catalog*') || request()->is('admin/tags') || request()->is('admin/candle')) ? '-rotate-90':'' }}  select-none aspect-square h-6 p-1">
                        <svg
                            class="h-full"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                        </svg>
                    </div>
                </li>

                <div id="catalog_more" class="{{ (request()->is('admin/catalog*') || request()->is('admin/tags') || request()->is('admin/candle')) ? 'block bg-[#eaeaea]':'hidden' }}  select-none">
                    <hr>
                    <a href="/admin/catalog">
                        <li class="{{ request()->is('admin/catalog*') ? 'bg-[#D9D9D9]':'' }}  hover:bg-[#D9D9D9] pl-28 py-1">
                            Cakes
                        </li>
                    </a>
                    <a href="/admin/tags">
                        <li class="{{ request()->is('admin/tags') ? 'bg-[#D9D9D9]':'' }}  hover:bg-[#D9D9D9] pl-28 py-1">
                            Tags
                        </li>
                    </a>
                    {{-- <a href="/admin/candle">
                        <li class="{{ request()->is('admin/candle') ? 'bg-[#D9D9D9]':'' }}  hover:bg-[#D9D9D9] pl-28 py-1">
                            Candles
                        </li>
                    </a> --}}
                    <hr>
                </div>

                <br><hr class="border-b-2 mb-2">

                <a href="/admin/sales">
                    <li class="{{ request()->is('admin/sales') ? 'bg-[#D9D9D9] font-bold border-l-4 pl-9 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex items-center gap-5">
                        <svg
                            class="aspect-square h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 400c0 44.2 35.8 80 80 80l400 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 416c-8.8 0-16-7.2-16-16L64 64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/>
                        </svg>
                        <div>Sales Report</div>
                    </li>
                </a>
            </ul>

        @endif

        <br><hr class="border-b-2 mb-2">

        <ul>
            <div id="profile" class="{{ (request()->is('user/info') || request()->is('user/change-password') || request()->is('user/address')) ? 'bg-[#eaeaea] font-bold border-l-4 pl-9 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex justify-between cursor-pointer">
                <a href="/user/info" class="flex items-center gap-5">
                    <svg
                        class="aspect-square h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/>
                    </svg>
                    <div>Profile</div>
                </a>
                <div id="profile_rotate" class="transition {{ (request()->is('user/info') || request()->is('user/change-password') || request()->is('user/address')) ? '-rotate-90':'' }}  select-none aspect-square h-6 p-1">
                    <svg
                        class="h-full"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                    </svg>
                </div>
            </div>

            <div id="profile_more" class="{{ (request()->is('user/info') || request()->is('user/change-password') || request()->is('user/address')) ? 'block bg-[#eaeaea]':'hidden' }}  select-none">
                <hr>
                <a href="/user/info">
                    <li class="{{ request()->is('user/info') ? 'bg-[#D9D9D9]':'' }}  hover:bg-[#D9D9D9] pl-28 py-1">
                        Account
                    </li>
                </a>
                <a href="/user/address">
                    <li class="{{ request()->is('user/address') ? 'bg-[#D9D9D9]':'' }}  hover:bg-[#D9D9D9] pl-28 py-1">
                        Address
                    </li>
                </a>
                <a href="/user/change-password">
                    <li class="{{ request()->is('user/change-password') ? 'bg-[#D9D9D9]':'' }}  hover:bg-[#D9D9D9] pl-28 py-1">
                        Password
                    </li>
                </a>
                <hr>
            </div>
        </ul>




        <br><hr class="border-b-2 mb-2">

        <div class="hover:bg-[#D9D9D9] px-10 py-3 font-semibold text-red-500 fill-red-500 cursor-pointer flex items-center gap-1">
            <svg
                class="aspect-square h-10 py-2"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
            </svg>
            <form action="/logout" method="POST">
                @csrf
                <button>Log Out</button>
            </form>
        </div>


    </div>
</nav>

@vite(['resources/js/nav-user.js'])
