<x-layout>

    <x-header></x-header>

    <!-- Main Content -->
    <div class="bg-[#F3D2C1]">
        <!-- HEADER SECTION -->
        <div class="relative w-full h-[800px] overflow-hidden pt-20 shadow-md shadow-gray-700">
            <img src="images/cake-sample-1.jpeg" alt="featured background cake" class="absolute top-0 left-0 w-full h-full object-cover z-[0]">
            <div class="bg-[#9D9595] w-full h-full absolute top-0 left-0 opacity-70 z-10"></div>
            <div class="relative flex flex-col items-start justify-center px-40 z-20 w-full h-full">
                <h1 class="text-6xl font-localLobster">
                    Bake Your Memories <br>
                    Every time!
                </h1>
                <h2 class="mt-10 text-xl font-semibold">
                    Build memories with our sweetest <br>
                    cakes in the town
                </h2>
                <a href="cakes">
                    <button class="mt-10 border-2 border-[#F55447] bg-[#F44336] hover:bg-[#F55447] text-white text-2xl font-mono shadow-lg shadow-gray-600 hover:shadow font-bold py-1 px-10 rounded-r-md rounded-l-md">
                        EXPLORE
                    </button>
                </a>
            </div>
        </div>

        {{-- ABOUT SECTION --}}
        <div class="w-full h-[900px] flex items-center justify-center relative overflow-hidden">
            <div id="about-img" class="w-[500px] h-[720px] bg-gray-400 relative shadow-lg shadow-gray-600" >
                <img src="images/cake-sample-1.jpeg" alt="bakeshop" class="w-full h-full object-cover">
            </div>
            <div id="about-def" class="w-[600px] h-[720px] flex flex-col -left-5 relative ">
                <div class="w-full h-[150px] text-3xl font-localLobster px-20 flex items-center">
                    About <br> Memories Cake
                </div>
                <div class="w-full h-[500px] bg-white p-28 shadow-md shadow-gray-500">
                    <p class="text-lg">
                        Welcome to Memories Cake, where every bite is a sweet reminder of life’s special moments.
                        Founded with a passion for baking and a love for creating unforgettable experiences,
                        our mission is to turn your celebrations into cherished memories.
                    </p>
                    <button class="mt-10 hover:border-2 border-[#F55447] bg-[#F44336] hover:bg-[#F44336] text-white text-xl font-mono shadow-md shadow-gray-400 font-semibold py-1 px-10 rounded-r-md rounded-l-md">
                        Learn More
                    </button>

                </div>
            </div>
        </div>

        {{-- CAKE SECTION --}}
        <div class="w-full p-20  overflow-hidden">
            <div class="flex justify-between px-20 overflow-hidden">
                <p class="text-3xl font-localLobster" id="featured-title">
                    Hot Selling Cakes
                </p>
                <span>more</span>
            </div>
            <div class="flex justify-evenly mt-10" id="featured-card">
                @for ($i = 0, $cake = $cakes[$i]; $i < 4; $cake = $cakes[++$i])
                    <x-cake-card
                        cakeImage="{{ $cake['image'] }}"
                        cakeName="{{ $cake['name'] }}"
                        cakePrice="{{ $cake['price'] }}"
                        >
                    </x-cake-card>
                @endfor
            </div>
        </div>
    </div>

    <x-footer></x-footer>

    <script>

        let aboutImage = document.getElementById('about-img');
        let aboutDefinition = document.getElementById('about-def');
        let featuredTitle = document.getElementById('featured-title');
        let featuredCard = document.getElementById('featured-card');

        window.addEventListener('load', function() {
            // window.scrollY = 0;
            aboutImage.style.left = '-100%';
            aboutDefinition.style.left = '100%';
            featuredTitle.style.opacity = "0";
            featuredCard.style.opacity = "0";
        });

        document.addEventListener('scroll', function () {

            let sY = window.scrollY;

            //console.log(sY);

            if (sY > 1100) {
                featuredTitle.classList.add('animate-feat-title');
                featuredCard.classList.add('animate-feat-card');
            } else if (sY > 300) {
                aboutImage.classList.add('animate-img');
                aboutDefinition.classList.add('animate-def');
            } else if (sY == 0) {
                aboutImage.classList.remove('animate-img');
                aboutDefinition.classList.remove('animate-def');
                featuredTitle.classList.remove('animate-feat-title');
                featuredCard.classList.remove('animate-feat-card');
            }
            // aboutImage.style.left = sY + "px";
            // aboutDefinition.style.left = -sY + "px";

        });
    </script>

</x-layout>
