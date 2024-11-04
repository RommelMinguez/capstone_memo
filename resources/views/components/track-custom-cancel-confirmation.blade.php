

<div id="cancel-confirmation" class="fixed hidden inset-0 h-screen w-screen bg-black bg-opacity-50 z-50">
    <div class="min-h-full flex justify-center items-center">

        <form action="/user/custom-order/cancel/" method="POST" id="cancel-confirmation-form">
            @csrf
            @method('PATCH')

            <div class="p-5 bg-[#FEF6E4] rounded-xl border shadow-md">
                <div class="flex justify-between items-center">
                    <div class="font-bold text-xl">Cancel Cake</div>
                    <div title="Close Create Form" id="close-cancel" class="cursor-pointer aspect-square w-7 rounded-full p-2 hover:bg-red-500 hover:fill-white fill-red-500">
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

                <div class="pr-10 fill-red-700 flex items-center gap-4">
                    <svg
                        class="w-7"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path  d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                    </svg>
                    <div>
                        Are you certain you wish to proceed with canceling this order?
                    </div>
                </div>

                <br><br>

                <div class="flex justify-center gap-10 items-center">
                    {{-- <div id="cancel-delete" class="py-2 px-4 rounded-md bg-red-500 hover:bg-red-600 text-white shadow-md cursor-pointer active:scale-95">
                        Cancel
                    </div> --}}
                    <div id="confirm-cancel" class="py-2 px-4 rounded-md bg-red-500 hover:bg-red-600 text-white shadow-md cursor-pointer active:scale-95">
                        Confirm
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
