<div class="address-card border rounded-md shadow-md  p-3 cursor-pointer hover:bg-gray-100 active:scale-95 {{ $address->id == Auth::user()->mainAddress->id ? 'bg-gray-100 border-red-500':'bg-white' }}" data-address="{{ json_encode($address) }}">
    <ul>
        <li>
            <span class="font-bold mr-5">{{ $address->name }}</span>
            <span class="text-gray-400 font-semibold">{{ $address->phone_number }}</span>
        </li>
        <li>{{ $address->unit_floor ? $address->unit_floor.', ':"" }}{{ $address->street_building }}</li>
        <li>{{ Str::title($address->province) }}, {{ Str::title($address->city_municipality) }}, {{ $address->barangay }}</li>
    </ul>
</div>
