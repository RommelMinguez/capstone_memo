<header class="bg-[#ffdab9] border-b-2 border-[#fffcdb] fixed inset-0 h-fit  z-50 shadow-sm shadow-gray-500">
    <div class="container mx-auto flex items-center justify-between py-3  px-10">
        <!-- Left side: Logo and Name -->
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/new-memo-logo.png') }}" alt="Logo" class="h-12 w-12 mr-2 rounded-full shadow-md shadow-gray-400">
                <span class="text-xl font-localLobster">Memories Cakes</span>
            </a>
            <a href="/cakes" class="text-xl font-localLobster ml-20">Explore</a>
        </div>

        <!-- Center: Empty -->
        <div class="flex-1"></div>

        <!-- Right side: Sign Up Button -->
        <div class="flex">
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
                <form action="/logout" method="POST">

                    @csrf

                    <button>Log Out</button>
                </form>
            @endauth
        </div>
    </div>
</header>
