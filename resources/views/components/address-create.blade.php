@props([
    'regions'

])

<div id="address-create-form" class="fixed hidden inset-0 h-screen w-screen bg-opacity-60 bg-black z-50  overflow-auto ">
    <div class="flex min-h-full justify-center items-center  py-10 ">
        <form action="/user/address" method="POST" class="h-fit">

            @csrf

            <div class="p-5 bg-[#FEF6E4] rounded-xl border shadow-md">
                <div class="flex justify-between items-center">
                    <div class="font-bold text-xl">Add New Address</div>
                    <div id="close-create-form" title="Close Create Form" class="cursor-pointer aspect-square w-7 rounded-full p-2 hover:bg-red-500 hover:fill-white fill-red-500">
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

                {{-- INPUTS --}}
                <div class="flex flex-col gap-2 mb-5">
                    <div class="flex justify-between items-center gap-2">
                        <label for="name" class="font-semibold">Recipient's Name: <span class="text-red-500 italic">*</span></label>
                        <input type="text" id="name" name="name" required class="p-2 border rounded-md shadow-sm w-80">
                    </div>
                    <div class="flex justify-between items-center gap-2">
                        <label for="phone_number" class="font-semibold">Phone Number: <span class="text-red-500 italic">*</span></label>
                        <input type="number" id="phone_number" name="phone_number" required class="p-2 border rounded-md shadow-sm w-80">
                    </div>
                    <hr>
                    {{-- REGION --}}
                    <div class="flex justify-between items-center gap-2">
                        <label for="region" class="font-semibold">Region: <span class="text-red-500 italic">*</span></label>
                        <select id="region" name="region" required class="p-2 border rounded-md shadow-sm w-80">
                            {{-- <option value="REGION X (NORTHERN MINDANAO)" selected readonly>REGION X (NORTHERN MINDANAO)</option> --}}
                            @foreach ($regions as $region)
                                <option {{ $region->regCode == 10 ? 'selected':'' }} value="{{ $region->regDesc }}" data-code="{{ $region->regCode }}">{{ $region->regDesc }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- PROVINCE --}}
                    <div class="flex justify-between items-center gap-2">
                        <label for="province" class="font-semibold">Province: <span class="text-red-500 italic">*</span></label>
                        <select  id="province" name="province" required class="p-2 border rounded-md shadow-sm w-80">
                            {{-- <option value="BUKIDNON" selected >BUKIDNON</option> --}}
                        </select>
                    </div>
                    {{-- CITY MUNICIPALITY --}}
                    <div class="flex justify-between items-center gap-2">
                        <label for="city_municipality" class="font-semibold">City/Municipality: <span class="text-red-500 italic">*</span></label>
                        <select  id="city_municipality" name="city_municipality" required class="p-2 border rounded-md shadow-sm w-80">
                            {{-- <option value="MALITBOG" selected >MALITBOG</option> --}}
                        </select>
                    </div>
                    {{-- BARANGAY --}}
                    <div class="flex justify-between items-center gap-2">
                        <label for="barangay" class="font-semibold">Barangay: <span class="text-red-500 italic">*</span></label>
                        <select  id="barangay" name="barangay" required class="p-2 border rounded-md shadow-sm w-80">
                            {{-- <option value="Poblacion" selected >Poblacion</option> --}}
                        </select>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center gap-2">
                        <label for="street_building" class="font-semibold">Street/Building Name: <span class="text-red-500 italic">*</span></label>
                        <input type="text" id="street_building" name="street_building" required  class="p-2 border rounded-md shadow-sm w-80">
                    </div>
                    <div class="flex justify-between items-center gap-2">
                        <label for="unit_floor" class="font-semibold">Unit/Floor:</label>
                        <input type="text" id="unit_floor" name="unit_floor" class="p-2 border rounded-md shadow-sm w-80">
                    </div>
                    <hr>
                </div>

                <div class="flex justify-end">
                    <button class="py-2 px-5 text-white font-semibold border rounded-md bg-red-500 shadow-sm hover:bg-red-600 active:scale-95">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
