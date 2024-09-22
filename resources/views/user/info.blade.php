<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-20 w-full md:w-5/6 min:h-screen">
            <div class="w-5/6 lg:w-4/6 m-auto">
                <div class="py-10 font-bold text-3xl">
                    Account Information
                </div>
                <br><br>

                <form action="/user/info" method="POST" class="w-full">

                    @csrf
                    @method('PATCH')

                    <div class="flex justify-between items-end gap-10">
                        <div class="flex-1">
                            <div class="flex gap-5 items-center">
                                <label for="first_name" class="font-semibold">FIRST NAME</label>
                                @error('first_name')
                                    <div class="italic text-red-600 text-xs">{{ $message }}.</div>
                                @enderror
                            </div>
                            <div class="relative mb-5 mt-1 rounded-sm shadow-md shadow-gray-400 overflow-hidden">
                                <input type="text" id="first_name" name="first_name" value="{{ Auth::user()->first_name }}"  required class="border rounded-sm w-full h-10 bg-[#F5D2D2] p-5 toggle-password">
                            </div>
                        </div>

                        <div class="flex-1">
                            <div class="flex gap-5 items-center">
                                <label for="last_name" class="font-semibold">LAST NAME</label>
                                @error('last_name')
                                    <div class="italic text-red-600 text-xs">{{ $message }}.</div>
                                @enderror
                            </div>
                            <div class="relative mb-5 mt-1 rounded-sm shadow-md shadow-gray-400 overflow-hidden">
                                <input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}"  required class="border rounded-sm w-full h-10 bg-[#F5D2D2] p-5 toggle-password">
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-5 items-center">
                        <label for="email" class="font-semibold">EMAIL</label>
                        @error('email')
                            <div class="italic text-red-600 text-xs">{{ $message }}.</div>
                        @enderror
                    </div>
                    <div class="relative mb-5 mt-1 rounded-sm shadow-md shadow-gray-400 overflow-hidden">
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"  required class="border rounded-sm w-full h-10 bg-[#F5D2D2] p-5 toggle-password">
                    </div>

                    <div class="flex gap-5 items-center">
                        <label for="phone_number" class="font-semibold">PHONE NUMBER</label>
                        @error('phone_number')
                            <div class="italic text-red-600 text-xs">{{ $message }}.</div>
                        @enderror
                    </div>
                    <div class="relative mb-5 mt-1 rounded-sm shadow-md shadow-gray-400 overflow-hidden">
                        <input type="number" id="phone_number" name="phone_number" value="{{ Auth::user()->phone_number }}"  required class="border rounded-sm w-full h-10 bg-[#F5D2D2] p-5 toggle-password">
                    </div>

                    <div class="flex gap-5 items-center">
                        <label for="address" class="font-semibold">ADDRESS</label>
                        @error('address')
                            <div class="italic text-red-600 text-xs">{{ $message }}.</div>
                        @enderror
                    </div>
                    <div class="relative mb-5 mt-1 rounded-sm shadow-md shadow-gray-400 overflow-hidden">
                        <input type="text" id="address" name="address"  required class="border rounded-sm w-full h-10 bg-[#F5D2D2] p-5 toggle-password">
                    </div>

                    <br><br>
                    <div class="w-full">
                        <x-nav-link :isButton="true" type="submit" class="w-full">SAVE CHANGE</x-nav-link>
                    </div>
                    <br><br>
                </form>
            </div>
        </main>
    </div>

    @session('success')
        <x-response-success>{{ session('success') }}</x-response-success>
    @endsession
</x-layout>
