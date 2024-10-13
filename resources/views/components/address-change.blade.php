<div id="choose-address" class="fixed hidden inset-0 h-screen w-screen bg-opacity-60 bg-black z-50  overflow-auto ">
    <div class="flex min-h-full justify-center items-center  py-10 ">
        <div class="py-5 px-10 bg-[#FEF6E4] rounded-xl border shadow-md">
            <div class="flex justify-between items-center">
                <div class="font-bold text-xl">Change Address</div>
                <div id="close-address" title="Close Create Form" class="cursor-pointer aspect-square w-7 rounded-full p-2 hover:bg-red-500 hover:fill-white fill-red-500">
                    <svg
                        class="w-full"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 384 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                    </svg>
                </div>
            </div>
            <hr><br>
            <a href="/user/address">
                <div class="border-2 border-red-400 border-dashed text-red-400 hover:border-red-500 hover:text-red-500 flex justify-center items-center font-semibold h-20 rounded-lg cursor-pointer">
                    + Add Address
                </div>
            </a>
            @php
                $allAddress = Auth::user()->addresses;
            @endphp
            <div class="flex flex-col gap-2 pt-2">
                @foreach ($allAddress as $adr)
                    <x-address-card-change :address="$adr"></x-address-card-change>
                @endforeach
            </div>
        </div>
    </div>
</div>
