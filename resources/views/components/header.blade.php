<header class="bg-[#ffdab9] border-b-2 border-[#fffcdb] fixed inset-0 h-fit  z-50 shadow-sm shadow-gray-400">
    <div class="min-w-full mx-auto flex items-center justify-between py-3  lg:px-10 px-5">
        <!-- Left side: Logo and Name -->
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/new-memo-logo.png') }}" alt="Logo" class="h-12 w-12 mr-2 rounded-full shadow-md shadow-gray-400">
                <span class="{{ request()->is('/') ? 'text-[#F55447]': '' }} hover:text-[#F44336] text-xl font-localLobster">Memories Cakes</span>
            </a>
            <a href="/cakes" class="{{ request()->is('cakes') ? 'text-[#F55447] bg-[#eec9a8]': '' }} hover:text-[#F44336] ml-10 py-2 px-5 rounded-lg text-xl font-localLobster hidden md:block">Explore</a>
        </div>

        <!-- Center: Empty -->
        <div></div>

        <!-- Right side: Sign Up Button -->
        <div class="flex">
            <div class="hidden md:flex">
                @guest
                    <a href="/login" class="rounded-l-full">
                        <button type="button" class="border-y-2 border-l-2 border-r border-[#F44336] bg-transparent hover:bg-[#F44336] text-[#F44336] hover:text-white font-bold py-1 px-5 rounded-l-full active:text-sm">
                            Log In
                        </button>
                    </a>
                    <a href="/register" class="rounded-r-full">
                        <button type="button" class="border-y-2 border-l border-r-2 border-[#F44336] bg-transparent hover:bg-[#F44336] text-[#F44336] hover:text-white font-bold py-1 px-5 rounded-r-full active:text-sm">
                            Register
                        </button>
                    </a>
                @endguest
                @auth
                    <div class="flex gap-3">

                        @if (!Auth::user()->is_admin)
                            <a href="/user/cart" class="{{ request()->is('user/cart') ? 'text-[#F55447] bg-[#eec9a8] font-semibold': '' }} hover:bg-[#eec9a8] rounded-lg flex gap-1 h-12 p-3 fill-[#F55447] text-[#F55447] relative">
                                <svg
                                    class="aspect-square h-full "
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                                </svg>
                                <div class="absolute bg-red-600 text-white font-light px-1 min-w-4 max-w-10 overflow-hidden text-center rounded-full left-1 bottom-1 shadow-md" style="font-size:.6rem;">
                                    @php
                                        if (Auth::user()->carts()->where('status', 'open')->exists()) {
                                            $openCart = Auth::user()->carts()->with('cartItems')->where('status', 'open')->first();
                                            $items = $openCart->cartItems->count();
                                            echo ($openCart && $items != 0) ? $items:'';
                                        }
                                    @endphp
                                </div>
                                <div>Cart</div>
                            </a>
                        @else
                            <a href="/chatify" class="{{ request()->is('/chatify') ? 'text-[#F55447] bg-[#eec9a8] font-semibold': '' }} hover:bg-[#eec9a8] rounded-lg flex gap-1 h-12 p-3 fill-[#F55447] text-[#F55447]">
                                <svg
                                    class="aspect-square h-full "
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c0 0 0 0 0 0s0 0 0 0s0 0 0 0c0 0 0 0 0 0l.3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z"/>
                                </svg>
                                <div>Message</div>
                            </a>
                        @endif

                        <a href="#" class="{{ request()->is('#') ? 'text-[#F55447] bg-[#eec9a8] font-semibold': '' }} hover:bg-[#eec9a8] rounded-lg flex gap-0 h-12 p-3 fill-[#F55447] text-[#F55447]">
                            <svg
                                class="aspect-square h-full"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/>
                            </svg>
                            <div>Notification</div>
                        </a>
                        <div class="relative group">
                            <a
                                href="{{ (Auth::user()->is_admin) ? '/admin' : '/user' }}"
                                class="{{
                                    (request()->is('user*') && !request()->is('user/cart') && !request()->is('user/order') ) ||
                                    request()->is('admin*') ? 'text-[#F55447] bg-[#eec9a8]  font-semibold': '' }} hover:bg-[#eec9a8]  rounded-lg  flex gap-2 h-12 p-3 fill-[#F55447] text-[#F55447] ">
                                {{-- <svg
                                    class="aspect-square h-full "
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/>
                                </svg> --}}
                                <div class="aspect-square h-full outline-4 outline-red-500 rounded-full shadow-md overflow-hidden">
                                    <img src="{{ Storage::url(Auth::user()->image_src) }}" alt="Profie Pic" class="w-full h-full object-cover rounded-full">
                                </div>
                                <div>{{ Str::title(Auth::user()->first_name )}}</div>
                            </a>

                            @php
                                $haveDraftOrder = session()->has('order') && (session('orderUser') == Auth::user()->id);
                            @endphp

                            <x-nav-user-dropdown :haveDraftOrder="$haveDraftOrder"></x-nav-user-dropdown>

                            @if ($haveDraftOrder)
                                <div class="bg-red-600 w-3 aspect-square rounded-full shadow-md absolute bottom-2 left-2"></div>
                            @endif

                        </div>
                    </div>
                @endauth
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-[#F44336] p-2 text-white hover:bg-[#D22115] " aria-controls="mobile-menu" aria-expanded="false">
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
