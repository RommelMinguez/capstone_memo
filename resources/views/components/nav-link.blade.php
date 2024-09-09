@props([
    'isButton' => false,
    'isWidthFull' => false
])

@if($isButton)
    <button
        class="{{ ($isWidthFull) ? 'w-full':'w-fit'  }} font-semibold border-2 border-[#F55447] bg-[#F44336] hover:bg-[#D22115] hover:scale-95 text-white text-xl shadow-md shadow-gray-500 py-2 px-10 rounded-sm"
        {{ $attributes }}>
        {{ $slot }}
    </button>
@else
    <a
        class="{{ ($isWidthFull) ? 'w-full':'w-fit'  }} font-semibold border-2 border-[#F55447] bg-[#F44336] hover:bg-[#D22115] hover:scale-95 text-white text-xl shadow-md shadow-gray-500 py-2 px-10 rounded-sm"
        {{ $attributes }}>
        {{ $slot }}
    </a>
@endif
