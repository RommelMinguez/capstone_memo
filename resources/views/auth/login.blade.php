<x-layout>

    <div class="w-[800px] py-20 bg-[#FEF6E4] relative rounded-md top-10 flex justify-center items-center shadow-md shadow-gray-500">

        <div class="absolute h-[500px] w-[500px] bottom-0 left-[750px] z-0">
            <img src="images/signin.png" alt="icon" class="w-full h-full object-cover">
        </div>

        <div class="w-[500px] py-5 bg-gray-50 rounded-lg shadow-md shadow-gray-500 flex flex-col items-center p-5 z-20">
            <a href="/" >
                <img src="images/new-memo-logo.png" alt="Logo" class="h-20 w-20 rounded-xl shadow-md shadow-gray-400">
            </a>

            <p class="font-localLobster text-3xl p-8">Welcome Back!</p>

            <form action="/login" method="POST" class="p-5 w-full">

                @csrf

                <label for="email" class="font-semibold">Email</label>
                <input type="email" id="email" name="email" placeholder="memoBakeshop@gmail.com" required class="w-full h-9 bg-[#F5D2D2] px-5 mb-7 mt-1 rounded-sm">

                <div class="flex justify-between">
                    <label for="password" class="font-semibold">Password</label>
                    <div class="text-sm font-light text-gray-500"><a href="#">Forgot Password?</a></div>
                </div>
                <div class="relative mb-8 mt-1 rounded-sm ">
                    <input type="password" id="password" name="password"  required minlength="8" class="w-full h-9 bg-[#F5D2D2] px-5 ">
                    <div class="absolute h-9 w-9 right-0 top-0 p-2 cursor-pointer " id="show-hide-password">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill='#aaa' d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                        </svg>
                        <svg
                            class="hidden"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill='#aaa' d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
                        </svg>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-[#FF6E6C] text-white text-xl font-mono font-bold py-1 px-20 rounded-r-full rounded-l-full">
                        LOG-IN
                    </button>
                </div>
            </form>

            <div class="font-light text-gray-500 py-2 ">
                I dont have an account?
                <a href="/register" class="text-[#F44336] font-semibold"> Sign-Up </a>
            </div>


            <div class="flex items-center w-full my-2">
                <div class="flex-1 border-b border-gray-300"></div>
                <div class="font-light text-gray-500 text-sm px-5">or Sign In with</div>
                <div class="flex-1 border-b border-gray-300"><hr></div>
            </div>
            <div>GOOGLE</div>
            <br>
        </div>
    </div>

    <script>
        let password = document.getElementById('password');
        let togglePassword = document.getElementById('show-hide-password');

        togglePassword.addEventListener('mousedown', function() {
            password.type = 'text';
            togglePassword.children[0].classList.add('hidden');
            togglePassword.children[1].classList.remove('hidden');
        });
        togglePassword.addEventListener('mouseup', function() {
            password.type = 'password';
            togglePassword.children[0].classList.remove('hidden');
            togglePassword.children[1].classList.add('hidden');
        });
    </script>

</x-layout>
