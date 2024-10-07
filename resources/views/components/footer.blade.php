<footer class="bg-[#d1b0a0] min-w-full" style="box-shadow: 0px 0px 7px black">
    <div class="w-full flex justify-evenly pt-10 pb-20 flex-wrap gap-y-10">
        <div class="flex items-center justify-center flex-col w-full md:w-fit">
            <img src="{{ asset('images/new-memo-logo.png') }}" alt="Logo" class="w-36 md:w-48 aspect-square rounded-full shadow-md shadow-gray-400">
        </div>

        <div>
            <h3 class="font-bold mb-7">NAVIGATION</h3>
            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="/cakes">Explore</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/login">Login</a></li>
            </ol>
        </div>
        <div>
            <h3 class="font-bold mb-7">EXPLORE</h3>
            <ul>
                {{-- LINK IS HARDCODED THIS WILL MAKE AN ERROR IF THE DEFAULT TAG IS EDITED OR REMOVE --}}
                <li><a href="{{ url('/cakes/search?cake=&selected-tag%5B%5D=1') }}">Birthday</a></li>
                <li><a href="{{ url('/cakes/search?cake=&selected-tag%5B%5D=2') }}">Anniversary</a></li>
                <li><a href="{{ url('/cakes/search?cake=&selected-tag%5B%5D=3') }}">Wedding</a></li>
                <li><a href="{{ url('/cakes/search?cake=&selected-tag%5B%5D=4') }}">Graduation</a></li>
                <li><a href="{{ url('/cakes/search?cake=&selected-tag%5B%5D=5') }}">Holiday</a></li>
            </ul>
        </div>
        <div>
            <h3 class="font-bold mb-7">CONTACT US</h3>
            <ul class="flex flex-col gap-5">
                <li><a href="https://mail.google.com/mail/?view=cm&fs=1&to=edwardabunda26@gmail.com&su=Customer%20Inquiry%20Regarding%20Website/Cakes/Orders&body=Dear%20Edward%2C%0A%0AI%20have%20a%20question%20about%20the%20website%2C%20cakes%2C%20orders%2C%20or%20another%20related%20matter.%20Could%20you%20please%20assist%20me%20with%20the%20following%20details%3F%0A%0A%2D%20%5BYour%20Inquiry%20Here%5D%0A%0AThank%20you%2C%0A%5BYour%20Name%5D" target="_blank" class="flex items-center gap-5">
                    <svg
                        class="w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48
                        64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                    </svg>
                    <span>edwardabunda26@gmail.com</span>
                </a></li>
                <li class="flex items-center gap-5">
                    <svg
                        class="w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3
                        11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                    </svg>
                    <span>0917 638 6932</span>
                </li>
                <li class="flex justify-center">
                    <a href="https://web.facebook.com/memocakes" target="_blank" class="w-16 aspect-square">
                        <img src="/images/fb-logo.png" alt="Facebook Logo" title="Memories Cake by MEMO Bakeshop" class="w-full h-full object-cover">
                    </a>
                </li>
            </ul>
        </div>

    </div>
</footer>
