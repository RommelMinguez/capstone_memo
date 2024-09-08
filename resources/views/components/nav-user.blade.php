<nav class="min-w-[300px] w-1/6 min-h-screen bg-white pt-28 shadow-lg shadow-gray-800 relative z-30">
    <div class="pb-10 border-b-2 mb-5">
        <div class="w-28 h-28 rounded-full border shadow-sm m-auto">
            <img src="{{ asset('images/new-memo-logo.png') }}" alt="Profile Picture" class="w-full h-full object-cover rounded-full">
        </div>
        <br><br>
        <div class="text-center font-semibold text-2xl">JUAN DELA CRUZ</div>
    </div>
    <div class="sticky top-24">
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

            <a href="">
                <li class="{{ request()->is('/user') ? 'bg-[#D9D9D9] font-bold border-l-4 border-red-500 ':'' }}  hover:bg-[#D9D9D9] px-10 py-3">
                    Profile
                </li>
            </a>
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
