@props([
    'haveDraftOrder' => false,
])

@if (Auth::user()->is_admin)
    <div class="group-hover:block hidden  w-52 absolute z-50 right-0 bg-gray-800 rounded-lg text-white overflow-hidden shadow-md">
        <ul>
            @if ($haveDraftOrder)
                <li class="hover:bg-red-500">
                    <a href="/user/order" class="flex gap-2 px-4 py-2 fill-white hover:font-semibold">
                        <svg
                            class="w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 125.7-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/>
                        </svg>
                        <div>Unfinish Order</div>
                    </a>
                </li>
                <hr>
            @endif
            <li class="hover:bg-red-500">
                <a href="/admin" class="flex gap-2 px-4 pt-3 fill-white hover:font-semibold pb-1">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                    </svg>
                    <div>Dashboard</div>
                </a>
            </li>
            <li class="hover:bg-red-500">
                <a href="/admin/orders" class="flex gap-2 px-4 py-1 fill-white hover:font-semibold">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                    </svg>
                    <div>Manage Orders</div>
                </a>
            </li>
            <li class="hover:bg-red-500">
                <a href="/admin/custom" class="flex gap-2 px-4 pt-1 fill-white hover:font-semibold pb-3">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                    </svg>
                    <div>Custom Orders</div>
                </a>
            </li>
            <hr>
            <li class="hover:bg-red-500">
                <a href="/admin/catalog" class="flex gap-2 px-4 py-2 fill-white hover:font-semibold">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                    </svg>
                    <div>Cake Catalog</div>
                </a>
            </li>
            <hr>
            <li class="hover:bg-red-500">
                <a href="/admin/sales" class="flex gap-2 px-4 py-2 fill-white hover:font-semibold">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 400c0 44.2 35.8 80 80 80l400 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 416c-8.8 0-16-7.2-16-16L64 64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/>
                    </svg>
                    <div>Sales Report</div>
                </a>
            </li>
            <hr>
            <li class="hover:bg-red-500">
                <a href="/user/info" class="flex gap-2 px-4 pt-3 pb-1 fill-white hover:font-semibold">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/>
                    </svg>
                    <div>Profile</div>
                </a>
            </li>
            <li class="hover:bg-red-500">
                <a href="/user/address" class="flex gap-2 px-4 py-1 fill-white hover:font-semibold">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    </svg>
                    <div>Address</div>
                </a>
            </li>
            <li class="hover:bg-red-500">
                <a href="/user/change-password" class="flex gap-2 px-4 pt-1 pb-3 fill-white hover:font-semibold">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z"/>
                    </svg>
                    <div>Password</div>
                </a>
            </li>
            <hr>
            <li class="hover:bg-red-500">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="flex gap-2 px-4 py-2 text-red-500 fill-red-500 items-center hover:text-white hover:fill-white font-semibold w-full">
                        <svg
                            class="w-4 "
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                        </svg>
                        <div>Logout</div>
                    </button>
                </form>
            </li>
        </ul>
    </div>
@else
    {{-- CUSTOMER --}}
    <div class="group-hover:block hidden  w-52 absolute z-50 right-0 bg-gray-800 rounded-lg text-white overflow-hidden shadow-md">
        <ul>
            @if ($haveDraftOrder)
                <li class="hover:bg-red-500">
                    <a href="/user/order" class="flex gap-2 px-4 py-2 fill-white hover:font-semibold">
                        <svg
                            class="w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 125.7-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/>
                        </svg>
                        <div>Unfinish Order</div>
                    </a>
                </li>
                <hr>
            @endif
            <li class="hover:bg-red-500">
                <a href="/user" class="flex gap-2 px-4 pt-3 fill-white hover:font-semibold pb-1">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M448 160l-128 0 0-32 128 0 0 32zM48 64C21.5 64 0 85.5 0 112l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 64zM448 352l0 32-256 0 0-32 256 0zM48 288c-26.5 0-48 21.5-48 48l0 64c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-64c0-26.5-21.5-48-48-48L48 288z"/>
                    </svg>
                    <div>Track Orders</div>
                </a>
            </li>
            <li class="hover:bg-red-500">
                <a href="/chatify" class="flex gap-2 px-4 pt-1 fill-white hover:font-semibold pb-3">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9l.3-.5z"/>
                    </svg>
                    <div>Message</div>
                </a>
            </li>
            <hr>
            <li class="hover:bg-red-500">
                <a href="/user/info" class="flex gap-2 px-4 pt-3 pb-1 fill-white hover:font-semibold">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/>
                    </svg>
                    <div>Profile</div>
                </a>
            </li>
            <li class="hover:bg-red-500">
                <a href="/user/address" class="flex gap-2 px-4 py-1 fill-white hover:font-semibold">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    </svg>
                    <div>Address</div>
                </a>
            </li>
            <li class="hover:bg-red-500">
                <a href="/user/change-password" class="flex gap-2 px-4 pt-1 pb-3 fill-white hover:font-semibold">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z"/>
                    </svg>
                    <div>Password</div>
                </a>
            </li>
            <hr>
            <li class="hover:bg-red-500">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"  class="flex gap-2 px-4 py-2 text-red-500 fill-red-500 items-center hover:text-white hover:fill-white font-semibold w-full">
                        <svg
                            class="w-4 "
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                        </svg>
                        <div>Logout</div>
                    </button>
                </form>
            </li>
        </ul>
    </div>
@endif
