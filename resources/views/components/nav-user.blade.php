<nav class="min-w-[300px] w-1/6 min-h-screen bg-white pt-28 shadow-lg shadow-gray-800 relative z-30 hidden md:block">
    <div class="pb-10 border-b-2 mb-5">
        <div class="w-28 h-28 rounded-full border shadow-sm m-auto">
            <img src="{{ asset('images/new-memo-logo.png') }}" alt="Profile Picture" class="w-full h-full object-cover rounded-full">
        </div>
        <br><br>
        <div class="text-center font-semibold text-2xl">{{ Str::upper(Auth::user()->first_name). ' '. Str::upper(Auth::user()->last_name) }}</div>
    </div>
    <div class="sticky top-24 overflow-auto">
        <ol>

            <a href="/user">
                <li class="{{ request()->is('user') ? 'bg-[#D9D9D9] font-bold border-l-4 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3">
                    Track Order
                </li>
            </a>

            {{-- <li class="hover:bg-[rgb(217,217,217)] px-10 py-3 font-semibold">Custom Design</li> --}}

            <a href="/user/message">
                <li class="{{ request()->is('user/message') ? 'bg-[#D9D9D9] font-bold border-l-4 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3">
                    Message
                </li>
            </a>

            <br>
            <hr class="border-b-2 mb-2">


            <li id="profile" class="{{ (request()->is('user/info') || request()->is('user/change-password')) ? 'bg-[#eaeaea] font-bold border-l-4 border-red-500':'' }}  hover:bg-[#D9D9D9] px-10 py-3 flex justify-between">
                <a href="/user/info"><span>Profile</span></a>
                <span id="profile_rotate" class="transition {{ (request()->is('user/info') || request()->is('user/change-password')) ? '-rotate-90':'' }}  select-none">&lt;</span>

            </li>
            <div id="profile_more" class="{{ (request()->is('user/info') || request()->is('user/change-password')) ? 'block bg-[#eaeaea]':'hidden' }}  select-none">
                <hr>
                <a href="/user/info">
                    <li class="{{ request()->is('user/info') ? 'bg-[#D9D9D9]':'' }}  hover:bg-[#D9D9D9] pl-20 py-1">
                        Basic Info.
                    </li>
                </a>
                <a href="/user/change-password">
                    <li class="{{ request()->is('user/change-password') ? 'bg-[#D9D9D9]':'' }}  hover:bg-[#D9D9D9] pl-20 py-1">
                        Change Password
                    </li>
                </a>
                <hr>
            </div>

            <br>
            <hr class="border-b-2 mb-2">

            <li class="hover:bg-[#D9D9D9] px-10 py-3 font-semibold text-red-500 cursor-pointer">
                <form action="/logout" method="POST">
                    @csrf
                    <button>Log Out &gt;</button>
                </form>
            </li>
        </ol>
    </div>
</nav>

@vite(['resources/js/nav-user.js'])
