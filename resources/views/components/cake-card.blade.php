@props(['cakeImage', 'cakeName', 'cakePrice', 'cakeItem'])

<div class="w-[260px] h-[380px] bg-[#FEF6E4] rounded-xl shadow-xl overflow-hidden cursor-pointer cake-card"
    data-image="{{ $cakeImage }}"
    data-name="{{ $cakeName }}"
    data-price="{{ $cakePrice }}"
    >
    <div class="w-full h-[255px] relative rounded-xl overflow-hidden" >
        <img src="{{ $cakeImage }}" alt="bakeshop" class="w-full h-full object-cover">
    </div>

    <div class="h-[125px] flex flex-col justify-center items-center font-bold">
        <div class="text-[#F44336] flex justify-center items-center gap-2 font-bold mb-2">
            <span class="rounded-full bg-[#F44336] w-6 h-6 inline-flex justify-center items-center text-lg text-white">&#8369;</span> {{ $cakePrice }}
        </div>
        <div>{{ $cakeName }}</div>
        <div>* * * * * *</div>
    </div>

</div>
