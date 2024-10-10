@props([
    'address'
])

<div class="flex justify-between border-b py-5">
    <div class="flex justify-start gap-5 items-center">
        <div>
            <svg
                class="w-12"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#aaa" d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152l0 270.8c0 9.8-6 18.6-15.1 22.3L416 503l0-302.6zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6l0 251.4L32.9 502.7C17.1 509 0 497.4 0 480.4L0 209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77l0 249.3L192 449.4 192 255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
            </svg>
        </div>
        <div>
            <ul>
                <li>
                    <span class="font-bold mr-5">{{ $address->name }}</span>
                    <span class="text-gray-400 font-semibold">{{ $address->phone_number }}</span>
                </li>
                <li>{{ $address->unit_floor ? $address->unit_floor.', ':"" }}{{ $address->street_building }}</li>
                <li>{{ Str::title($address->province) }}, {{ Str::title($address->city_municipality) }}, {{ $address->barangay }}</li>
            </ul>
        </div>
    </div>
    <div class="flex gap-2">
        <div data-address="{{ json_encode($address) }}" title="Edit" class="edit-address-button py-2 pl-2 pr-1 flex justify-center items-center border rounded-md shadow-md bg-blue-500 hover:bg-blue-600 active:scale-95 h-8 aspect-square fill-white cursor-pointer relative">
            <svg
                class="w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z"/>
            </svg>
        </div>
        @if ($address->id != Auth::user()->mainAddress->id)
            <form action="/user/address/{{ $address->id }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit">
                    <div title="Set as Default" class="p-2 flex justify-center items-center border rounded-md shadow-md bg-yellow-500 hover:bg-yellow-600 active:scale-95 h-8 aspect-square fill-white cursor-pointer relative">
                        <svg
                            class="w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
                        </svg>
                    </div>
                </button>
            </form>

            <form action="/user/address/{{ $address->id }}}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')

                <div title="Delete" class="show-delete py-2 pl-2 pr-1 flex justify-center items-center border rounded-md shadow-md bg-red-500 hover:bg-red-600 active:scale-95 h-8 aspect-square fill-white cursor-pointer relative">
                    <svg
                        class="w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                    </svg>
                </div>

                <div class="delete-confirmation fixed hidden inset-0 h-screen w-screen bg-black bg-opacity-50 z-50">
                    <div class="min-h-full flex justify-center items-center">
                        <div class="p-5 bg-[#FEF6E4] rounded-xl border shadow-md">
                            <div class="flex justify-between items-center">
                                <div class="font-bold text-xl">Delete Address?</div>
                                <div title="Close Create Form" class="close-delete cursor-pointer aspect-square w-7 rounded-full p-2 hover:bg-red-500 hover:fill-white fill-red-500">
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
                                    This will permanently delete the address.
                                </div>
                            </div>

                            <br><br>

                            <div class="flex justify-center gap-10 items-center">
                                <div class="cancel-delete py-2 px-4 rounded-md bg-red-500 hover:bg-red-600 text-white shadow-md cursor-pointer active:scale-95">
                                    Cancel
                                </div>
                                <div class="confirm-delete py-2 px-4 rounded-md bg-red-500 hover:bg-red-600 text-white shadow-md cursor-pointer active:scale-95">
                                    Confirm
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
