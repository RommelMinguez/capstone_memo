<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <link rel="icon" type="image/png" href="images/new-memo-logo.png">
    <title>Memories Cake</title>

    <style>
        .animate-show-details {
            animation: showDetails 1s forwards;
        }
        @keyframes showDetails {
            from {
                top: 100%;
            }
            to {
                top: 15%;
            }
        }

        .animate-show-details-container {
            animation: showDetailsContainer 1s forwards;
        }
        @keyframes showDetailsContainer {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
                display: block;
            }
        }

        .animate-hide-details {
            animation: hideDetails 1s forwards;
        }
        @keyframes hideDetails {
            from {
                top: 15%;
            }
            to {
                top: 100% ;
            }
        }

        .animate-hide-details-container {
            animation: hideDetailsContainer 1s forwards;
        }
        @keyframes hideDetailsContainer {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
                display: none;
            }
        }
    </style>

</head>
<body class="bg-[#F3D2C1]">

    <x-header></x-header>

    <div class="container h-fit flex items-stretch justify-between my-20 px-20 relative ">
        {{-- SEARCH --}}
        <div class="w-10/12 ">
            <div class="flex justify-center align-middle gap-10 py-10">
                <div class="h-14 w-[500px] flex rounded-l-full rounded-r-full">
                    <form action="" method="GET" class="relative w-full">
                        <input type="text" placeholder="Search cakes here..." minlength="2" maxlength="25" class="w-full h-full rounded-l-full rounded-r-full px-10">
                        <button class="absolute right-0 top-0  h-14 w-20 rounded-full bg-[#F44336]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 m-auto"
                                viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#fff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                            </svg>
                        </button>
                    </form>
                </div>
                {{-- DESIGN --}}
                <div class="flex items-center">
                    <a href="#" >
                        <button class="border-2 border-[#F55447] bg-[#F44336] hover:bg-[#F55447] text-white text-lg shadow-sm shadow-gray-600 hover:shadow py-1 px-5 rounded-r-sm rounded-l-sm">
                            <svg
                                class="inline-block w-5 h-5 m-auto"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#fff"  d="M86.4 5.5L61.8 47.6C58 54.1 56 61.6 56 69.2L56 72c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L105.6 5.5C103.6 2.1 100 0 96 0s-7.6 2.1-9.6 5.5zm128 0L189.8 47.6c-3.8 6.5-5.8 14-5.8 21.6l0 2.8c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L233.6 5.5C231.6 2.1 228 0 224 0s-7.6 2.1-9.6 5.5zM317.8 47.6c-3.8 6.5-5.8 14-5.8 21.6l0 2.8c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L361.6 5.5C359.6 2.1 356 0 352 0s-7.6 2.1-9.6 5.5L317.8 47.6zM128 176c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48c-35.3 0-64 28.7-64 64l0 71c8.3 5.2 18.1 9 28.8 9c13.5 0 27.2-6.1 38.4-13.4c5.4-3.5 9.9-7.1 13-9.7c1.5-1.3 2.7-2.4 3.5-3.1c.4-.4 .7-.6 .8-.8l.1-.1s0 0 0 0s0 0 0 0s0 0 0 0s0 0 0 0c3.1-3.2 7.4-4.9 11.9-4.8s8.6 2.1 11.6 5.4c0 0 0 0 0 0s0 0 0 0l.1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c3-3.5 7.4-5.4 12-5.4s9 2 12 5.4l.1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c2.9-3.4 7.1-5.3 11.6-5.4s8.7 1.6 11.9 4.8c0 0 0 0 0 0s0 0 0 0s0 0 0 0l.1 .1c.2 .2 .4 .4 .8 .8c.8 .7 1.9 1.8 3.5 3.1c3.1 2.6 7.5 6.2 13 9.7c11.2 7.3 24.9 13.4 38.4 13.4c10.7 0 20.5-3.9 28.8-9l0-71c0-35.3-28.7-64-64-64l0-48c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48-64 0 0-48c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48-64 0 0-48zM448 394.6c-8.5 3.3-18.2 5.4-28.8 5.4c-22.5 0-42.4-9.9-55.8-18.6c-4.1-2.7-7.8-5.4-10.9-7.8c-2.8 2.4-6.1 5-9.8 7.5C329.8 390 310.6 400 288 400s-41.8-10-54.6-18.9c-3.5-2.4-6.7-4.9-9.4-7.2c-2.7 2.3-5.9 4.7-9.4 7.2C201.8 390 182.6 400 160 400s-41.8-10-54.6-18.9c-3.7-2.6-7-5.2-9.8-7.5c-3.1 2.4-6.8 5.1-10.9 7.8C71.2 390.1 51.3 400 28.8 400c-10.6 0-20.3-2.2-28.8-5.4L0 480c0 17.7 14.3 32 32 32l384 0c17.7 0 32-14.3 32-32l0-85.4z"/>
                            </svg>
                            &nbsp; Design your Cake
                        </button>
                    </a>
                </div>
            </div>
            {{-- CATALOG --}}
            <div class="flex flex-wrap justify-evenly gap-10 ">
                @for ($i = 0; $i < 9; $i++)
                    <x-cake-card></x-cake-card>
                @endfor
            </div>
        </div>

        {{-- RIGHT NAV --}}
        <div class="py-20 ">
            <ol class="flex text-right flex-col justify-end gap-5 text-[#F44336] text-lg font-semibold sticky top-36">
                <li><a href="#">Birthday</a></li>
                <li><a href="#">Anniversary</a></li>
                <li><a href="#">Wedding</a></li>
                <li><a href="#">Graduation</a></li>
                <li><a href="#">Holiday</a></li>
            </ol>
        </div>
    </div>

    <div class="hidden bg-opacity-75 bg-black fixed z-50 w-full h-lvh inset-0 overflow-hidden" id="cake-details-container">
        <div class="h-[15%] w-full flex items-center justify-center" id="hide-details">
            <svg
                class="bordr-4 w-14 h-14 bg-black bg-opacity-50 rounded-full p-3 shadow-sm shadow-gray-700"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 384 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#eee" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
            </svg>
        </div>
        <div class="bg-[#F3D2C1] w-full h-[85%] overflow-y-auto rounded-xl absolute" id="cake-details">
            <div class="w-full flex justify-evenly p-10">
                <div class="w-[540px] h-[740px] bg-gray-400 relative shadow-sm shadow-gray-700" >
                    <img src="images/cake-sample-1.jpeg" alt="bakeshop" class="w-full h-full object-cover">
                </div>
                <div class="w-[540px] h-[740px] bg-[#FEF6E4] p-10 shadow-sm rounded-md overflow-auto">
                    <div class="text-3xl font-bold font-serif mb-2">Cake name</div>
                    <div class="mb-5 text-lg">* * * * * (0)</div>
                    <div class="mb-10 text-xl font-bold text-[#F44336]">00.00</div>
                    <div class="mb-1 w-full h-12 overflow-hidden" style="box-shadow: inset 0px -20px 20px -20px black" id="cake-desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae a distinctio praesentium neque. Consequatur animi, distinctio consectetur error rem, cum autem, laborum odio aliquid labore ut qui est numquam voluptate.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit minus sunt odio! Nostrum nam earum quam error? Corporis autem praesentium libero voluptate, sapiente temporibus in iusto, odit, repellat qui enim!
                    </div>
                    <button class="mb-5 font-semibold underline" id="show-hide-desc"> Show more </button>
                    <hr>
                    <form action="" method="GET" class="mt-7 ">
                        <label for="dedication" class="font-bold">Dedication/Message:</label>
                        <textarea
                            class="w-full my-2 bg-[#EDE7E7] rounded-md p-5 shadow-md"
                            name="dedication" id="dedication" cols="30" rows="3" placeholder="Happy Birthday!!"></textarea>
                        <label for="quantity" class="font-bold">Quantity:</label>
                        <input class="my-2 w-20 h-10 block border-1 bg-[#EDE7E7] shadow-md font-bold font-mono px-5" type="number" id="quantity" name="quantity" value="1" min="1" max="99">
                        <div class="flex justify-center mt-10">
                            <button class="border-2 border-[#F55447] bg-[#F44336] hover:bg-[#F55447] text-white text-lg shadow-sm shadow-gray-600 hover:shadow py-1 px-10 rounded-r-sm rounded-l-sm">
                                <svg
                                    class="inline-block w-5 h-5  m-auto"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        fill="#ffffff"
                                        d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                &nbsp; ADD TO CART
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-gray-50 w-full p-20">
                <div class="flex justify-between">
                    <div></div>
                    <div>Reviews</div>
                    <div>write reviews</div>
                </div>

                @for($i = 0; $i < 5; $i++)
                    <div class="h-36 shadow-md border rounded-md p-10 mt-5">
                        <div class="flex justify-between">
                            <div>Username</div>
                            <div>00/00/00</div>
                        </div>
                        <p>comment here...</p>
                    </div>
                @endfor

                <div class="m-auto pt-10 underline text-center">Read more reviews</div>
            </div>


        </div>
    </div>

    <x-footer></x-footer>

    <script>
        let cakeDetailContainer = document.getElementById('cake-details-container');
        let cakeDetail = document.getElementById('cake-details');
        let hideDetail = document.getElementById('hide-details');
        let cakeCard = document.querySelectorAll('.cake-card');

        hideDetail.addEventListener('click', function () {
            cakeDetail.classList.remove('animate-show-details');
            cakeDetailContainer.classList.remove('animate-show-details-container');
            cakeDetail.classList.add('animate-hide-details');
            cakeDetailContainer.classList.add('animate-hide-details-container');
        });

        cakeCard.forEach(function(cake) {
            cake.addEventListener('click', function() {
                // Code to run when the element is clicked
                showCakeDetails();
            });
        });

        function showCakeDetails() {

            cakeDetailContainer.style.display = 'block';

            cakeDetail.classList.remove('animate-hide-details');
            cakeDetailContainer.classList.remove('animate-hide-details-container');
            cakeDetail.classList.add('animate-show-details');
            cakeDetailContainer.classList.add('animate-show-details-container');
        };


        let toggleDesc = document.getElementById('show-hide-desc');
        let isShowMore = true;
        let cakeDesc = document.getElementById('cake-desc');

        toggleDesc.addEventListener('click', function() {

            if (isShowMore) {
                toggleDesc.textContent = "Show less";
                cakeDesc.style.height = 'fit-content';
                cakeDesc.style.boxShadow = 'inset 0px 0px 0px 0px black';
                isShowMore = !isShowMore;
            } else {
                toggleDesc.textContent = "Show more";
                cakeDesc.style.height = '48px';
                cakeDesc.style.boxShadow = 'inset 0px -20px 20px -20px black';
                isShowMore = !isShowMore
            }

        });
    </script>
</body>
</html>
