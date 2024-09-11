@props([
    'isButton' => false,
])

@if($isButton)
    <button
    {{ $attributes->merge([
        'class' => 'font-semibold border-2 border-[#F55447] bg-[#F44336] hover:bg-[#D22115] hover:scale-95 text-white text-xl shadow-md shadow-gray-600 py-2 px-10 rounded-sm'
    ])}}>

    {{ $slot }}
    </button>
@else
    <a
        {{ $attributes->merge([
            'class' => 'font-semibold border-2 border-[#F55447] bg-[#F44336] hover:bg-[#D22115] hover:scale-95 text-white text-xl shadow-md shadow-gray-600 py-2 px-10 rounded-sm'
        ])}}>

        {{ $slot }}
    </a>
@endif
