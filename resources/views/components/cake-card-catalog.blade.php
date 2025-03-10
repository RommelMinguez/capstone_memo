
<div class="w-[200px] h-[320px] bg-[#FEF6E4] rounded-xl shadow-xl overflow-hidden cursor-pointer cake-card hover:scale-105 relative group">

    <div class="absolute inset-0 h-12 w-full bg-black bg-opacity-90 group-hover:flex hidden justify-center z-20 ">

        @php
            $tagsAttachedArr = $cake->tags->pluck('id')->toArray();
        @endphp

        <div title="Edit" data-cake="{{ json_encode($cake) }}" data-tags="{{ json_encode($tagsAttachedArr) }}" data-cakeImage="{{ Storage::url($cake->image_src) }}" class="update-show border-r w-1/2 hover:bg-white hover:bg-opacity-50 flex items-center justify-center fill-blue-400 hover:fill-blue-600">
            <svg
                class="w-6 "
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z"/>
            </svg>
        </div>
        <div title="delete" data-action="/admin/catalog/{{ $cake->id }}" class="show-delete border-l w-1/2 hover:bg-white hover:bg-opacity-50 flex items-center justify-center fill-red-400 hover:fill-red-600">
            <svg
                class="w-5 "
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2
                0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
            </svg>
        </div>
    </div>

    <div class="w-full h-4/6 relative rounded-xl overflow-hidden" >
        <img src="{{ Storage::url($cake->image_src) }}" alt="cake" class="w-full h-full object-cover">
    </div>
    <a href="/cakes/{{ $cake->id }}">
        <div class="h-2/6 w-full flex justify-center items-center flex-col gap-2 font-bold">
            <div class="text-[#F44336] flex justify-center items-center gap-2 font-bold">
                <span class="rounded-full bg-[#F44336] w-6 h-6 inline-flex justify-center items-center text-lg text-white">
                    &#8369;
                </span>
                {{ $cake->price }}
            </div>
            <div>{{ $cake->name }}</div>
            <div class="flex gap-3 fill-[#f44336]">

                @php
                    $rating = $cake->reviews_avg_rating ?? 0;
                @endphp

                @for($i = 0; $i < 5; $i++, $rating--)
                    @if ($rating >= 1)
                        <svg
                            class="w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12
                            3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2
                            7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                        </svg>
                    @elseif($rating > 0)
                        <svg
                            class="w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M309.5 13.5C305.5 5.2 297.1 0 287.9 0s-17.6 5.2-21.6 13.5L197.7 154.8 44.5 177.5c-9 1.3-16.5 7.6-19.3 16.3s-.5 18.1 5.9 24.5L142.2 328.4 116
                            483.9c-1.5 9 2.2 18.1 9.7 23.5s17.3 6 25.3 1.7l137-73.2 137 73.2c8.1 4.3 17.9 3.7 25.3-1.7s11.2-14.5 9.7-23.5L433.6 328.4 544.8 218.2c6.5-6.4 8.7-15.9
                            5.9-24.5s-10.3-14.9-19.3-16.3L378.1 154.8 309.5 13.5zM288 384.7l0-305.6 52.5 108.1c3.5 7.1 10.2 12.1 18.1 13.3l118.3 17.5L391 303c-5.5 5.5-8.1 13.3-6.8
                            21l20.2 119.6L299.2 387.5c-3.5-1.9-7.4-2.8-11.2-2.8z"/>
                        </svg>
                    @else
                        <svg
                            class="w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3
                            6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3
                            13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8
                            22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
                        </svg>
                    @endif
                @endfor
            </div>
        </div>
    </a>
</div>
