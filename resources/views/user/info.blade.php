<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-20 w-full md:w-5/6 min:h-screen">
            <div class="w-5/6 lg:w-4/6 m-auto">
                <div class="py-10 font-bold text-3xl">
                    Account Information
                </div>
                <br>

                <form action="/user/info" method="POST" enctype="multipart/form-data" class="w-full" >

                    @csrf
                    @method('PATCH')

                    <div class="flex justify-center mb-2">
                        <div class="w-40 aspect-square rounded-full border shadow-md">
                            <img id="imagePreview" src="{{ Storage::url(Auth::user()->image_src) }}" alt="Profile Picture" class="w-full h-full object-cover rounded-full">
                        </div>
                    </div>

                    @error('imageInput')
                        <div class="italic text-red-600 text-xs text-center">{{ $message }}.</div>
                    @enderror

                    <div class="flex items-center justify-center gap-5 w-full p-5">
                        <div>
                            <label for="imageInput">
                                <span id="btn_upload" class="cursor-pointer bg-red-400 text-white p-2 rounded-md focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 hover:bg-red-500 shadow-sm border">
                                    Upload Photo
                                </span>
                            </label>
                            <input id="imageInput" name="imageInput" type="file"  class="hidden" accept="image/*" />
                        </div>
                        <div id="btn_remove" class="hidden">
                            <span class="cursor-pointer bg-red-400 text-white p-2 rounded-md focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 hover:bg-red-500 shadow-sm border">
                                Remove
                            </span>
                        </div>
                    </div>

                    <br><br>

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
                        <label for="gender" class="font-semibold">GENDER</label>
                        @error('gender')
                            <div class="italic text-red-600 text-xs">{{ $message }}.</div>
                        @enderror
                    </div>
                    <div class="relative mb-5 mt-1 rounded-sm shadow-md shadow-gray-400 overflow-hidden">
                        <select id="gender" name="gender" class="border rounded-sm w-full h-10 bg-[#F5D2D2] px-5 toggle-password">
                            <option {{ Auth::user()->gender == '' ? 'selected':'' }} value="null" selected ></option>
                            <option {{ Auth::user()->gender == 'Male' ? 'selected':'' }} value="Male">Male</option>
                            <option {{ Auth::user()->gender == 'Female' ? 'selected':'' }} value="Female">Female</option>
                            <option {{ Auth::user()->gender == 'Other' ? 'selected':'' }} value="Other">Other</option>
                        </select>

                    </div>

                    <div class="flex gap-5 items-center">
                        <label for="birthday" class="font-semibold">BIRTHDAY</label>
                        @error('birthday')
                            <div class="italic text-red-600 text-xs">{{ $message }}.</div>
                        @enderror
                    </div>
                    <div class="relative mb-5 mt-1 rounded-sm shadow-md shadow-gray-400 overflow-hidden">
                        <input type="date" id="birthday" name="birthday" value="{{ Auth::user()->birthday }}"  class="border rounded-sm w-full h-10 bg-[#F5D2D2] p-5 toggle-password">
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

    <script>

        // CUSTOM FORM IMAGE PREVIEW
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        const btnUpload = document.getElementById('btn_upload');
        const btnRemove = document.getElementById('btn_remove');
        const orignalImage = imagePreview.src;

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.src = event.target.result;

                    btnUpload.textContent = 'Change Photo';
                    btnRemove.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                removePhoto();
            }

            console.log(imageInput.value);

        });
        btnRemove.addEventListener('click', function() {
           removePhoto();
        });

        function removePhoto() {
            btnUpload.textContent = 'Upload Photo';
            btnRemove.classList.add('hidden');
            imagePreview.src = orignalImage;
            imageInput.value = '';
        }
    </script>
</x-layout>
