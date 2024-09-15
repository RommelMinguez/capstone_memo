<header class="bg-[#ffdab9] border-b-2 border-[#fffcdb] fixed inset-0 h-fit  z-50 shadow-sm shadow-gray-500">
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
                    <div class="flex gap-5">
                        <a href="/user/cart">Cart</a>
                        <a href="#">Notification</a>
                        <a href="/user">{{ Auth::user()->first_name }}</a>
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
