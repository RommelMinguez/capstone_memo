@props(['cake', 'size' => 'normal'])


@if ($size == 'small')
    <a href="/cakes/{{ $cake->id }}">
        <div class="w-[200px] h-[320px] bg-[#FEF6E4] rounded-xl shadow-xl overflow-hidden cursor-pointer cake-card hover:scale-105">
            <div class="w-full h-4/6 relative rounded-xl overflow-hidden" >
                <img src="{{ Storage::url($cake->image_src) }}" alt="cake" class="w-full h-full object-cover">
            </div>

            <div class="h-2/6 w-full flex justify-center items-center flex-col gap-2 font-bold">
                <div class="text-[#F44336] flex justify-center items-center gap-2 font-bold">
                    <span class="rounded-full bg-[#F44336] w-6 h-6 inline-flex justify-center items-center text-lg text-white">
                        &#8369;
                    </span>
                    {{ $cake->price }}
                </div>
                <div>{{ $cake->name }}</div>
                <div>* * * * * *</div>
            </div>
        </div>
    </a>
@else
    <a href="/cakes/{{ $cake->id }}">
        <div class="w-[260px] h-[380px] bg-[#FEF6E4] rounded-xl shadow-xl overflow-hidden cursor-pointer cake-card hover:scale-105">
            <div class="w-full h-[255px] relative rounded-xl overflow-hidden" >
                <img src="{{ Storage::url($cake->image_src) }}" alt="cake" class="w-full h-full object-cover">
            </div>

            <div class="h-[125px] flex flex-col justify-center items-center font-bold">
                <div class="text-[#F44336] flex justify-center items-center gap-2 font-bold mb-2">
                    <span class="rounded-full bg-[#F44336] w-6 h-6 inline-flex justify-center items-center text-lg text-white">
                        &#8369;
                    </span>
                    {{ $cake->price }}
                </div>
                <div>{{ $cake->name }}</div>
                <div>* * * * * *</div>
            </div>
        </div>
    </a>
@endif

