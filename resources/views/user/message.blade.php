<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-10 w-5/6 h-screen relative">
            <div class="absolute top-10 w-full shadow-lg px-10 pt-12 pb-5 bg-white z-10">
                <div class="flex items-center">
                    <img src="{{ asset('images/new-memo-logo.png') }}" alt="Logo" class="h-16 w-16 mr-2 border-2 border-[#2CDD3E] rounded-full shadow-sm shadow-gray-400">
                    <div class="mx-2">
                        <span class="font-bold">Memories Cakes</span>
                        <br>
                        <span class="text-xs font-light">online</span>
                    </div>
                </div>
            </div>


            <div class="absolute bottom-0 w-full">
                <div class="flex justify-center py-10">
                    <div class="h-16 w-11/12 flex">
                        <form action="" method="GET" class="relative w-full shadow-sm rounded-l-md rounded-r-md shadow-gray-700">
                            <input type="text" placeholder="Write your message here..." minlength="1" maxlength="255" class="w-full h-full rounded-l-md rounded-r-md px-10 border">
                            <div class="absolute right-0 top-0 h-full w-20 py-3 ">
                                <button class="text-white w-16 h-10 rounded-md bg-[#F44336]">
                                    SEND
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

</x-layout>
