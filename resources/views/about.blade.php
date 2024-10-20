<x-layout>
    <x-header></x-header>


    {{-- Main Content --}}

    <div class="flex justify-center items-start min-h-screen mb-10 pt-5 pl-8" data-aos="fade-up" style="margin-top: 100px">
        <!-- "About Us" Label -->

        <div class="bg-white w-[1300px] h-auto border border-gray-300 shadow-lg p-5 rounded-lg flex flex-wrap">
            <!-- Left Text Section -->
            <div class="w-full lg:w-1/2 p-6" data-aos="fade-right">
                <h1 class="text-4xl font-localLobster text-black mb-10">We Bake Every Cake From the Core of Our Hearts</h1>
                <p class="text-gray-700 leading-relaxed mb-7">
                    At Memories Cake, we believe that every special occasion deserves to be celebrated with the perfect cake.
                    Founded with a passion for crafting unique, beautiful, and delicious cakes, we have made it our mission to
                    help you create sweet memories that last a lifetime.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Memories Cake began with a simple idea: to bring joy and happiness through cakes that not only taste amazing but
                    also reflect the individuality of each celebration. From birthdays to weddings, and every moment in between,
                    we aim to make each event more memorable with a cake that is as special as the occasion itself.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Each cake is handcrafted with care, combining the finest ingredients with our team’s creativity and expertise.
                    Whether you're looking for a classic flavor or a custom-designed cake, we’re here to bring your vision to life.
                    Our commitment to quality ensures that every bite is a delightful experience.
                </p>
            </div>

            <!-- Right Image Section -->
            <div class="w-full lg:w-1/2 flex flex-col justify-between items-center p-6" data-aos="fade-left">
                <div class="w-full">
                    <img class="w-full h-auto rounded-lg object-cover" src="images/baking-hands.jpg" alt="Baking Image">
                </div>

                <!-- Statistics Section -->
                <div class="grid grid-cols-2 gap-6 mt-8 w-full" data-aos="zoom-in">
                    <div class="bg-pink-100 text-center p-6 rounded-lg">
                        <h2 class="text-3xl font-bold" style="color:#F44336;">5</h2>
                        <p class="text-gray-700">Years Experience</p>
                    </div>
                    <div class="bg-pink-100 text-center p-6 rounded-lg">
                        <h2 class="text-3xl font-bold" style="color:#F44336;">50</h2>
                        <p class="text-gray-700">Total Products</p>
                    </div>
                    <div class="bg-pink-100 text-center p-6 rounded-lg">
                        <h2 class="text-3xl font-bold" style="color:#F44336;">100</h2>
                        <p class="text-gray-700">Order Monthly</p>
                    </div>
                    <div class="bg-pink-100 text-center p-6 rounded-lg">
                        <h2 class="text-3xl font-bold" style="color:#F44336;">99%</h2>
                        <p class="text-gray-700">Customer Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- New Section: I am the Baker -->
<div class="bg-gray-100 mt-20 p-8 w-full border  border-gray-300 flex flex-col md:flex-row items-start space-x-0 md:space-x-6 h-auto md:h-[450px]" data-aos="fade-up">
    <!-- Baker's Photo with Overlay Border -->
    <div class="relative w-full md:w-1/3 mb-6 md:mb-0">
        <!-- Border div -->
        <div class="border-4 border-red-400 w-[200px] h-[300px] absolute top-2 left-1/2 transform -translate-x-1/2 z-0"></div>
        <!-- Image overlaid -->
        <img class="w-[200px] h-[290px] object-cover relative top-0.5 left-[120px] " src="images/client.jpg" alt="Baker Photo">
    </div>

    <!-- Baker's Info -->
    <div class="w-full md:w-2/3" data-aos="fade-left">
        <h2 class="text-red-600 text-xl ml-1 font-bold">HI!</h2>
        <h3 class="text-3xl font-bold mb-4">
             <div class="typing-animation" id="typingText">I am the Baker</div> <!-- Typing effect applied to this span -->
                </h3>
        <p class="text-gray-700 mb-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
        </p>

        <!-- Contact Info Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <p class="font-bold">Name:</p>
                <p>Rosie Memoracion</p>
            </div>
            <div>
                <p class="font-bold">Email:</p>
                <p>rosie@gmail.com</p>
            </div>
            <div>
                <p class="font-bold">Phone:</p>
                <p>+639 123 456 789</p>
            </div>
            <div>
                <p class="font-bold">Job:</p>
                <p>Professional Teacher</p>
            </div>
        </div>

        <!-- Facebook Button -->
        <a href="https://facebook.com" class="bg-red-500 text-white px-6 py-2 rounded-lg font-bold hover:bg-red-600">
            Visit Facebook
        </a>
    </div>
</div>


<!-- New Section: Testimonials Carousel -->
<div class="flex justify-center items-center mb-[200px] mt-20 p-10" data-aos="fade-up">
    <div class="max-w-screen-lg w-full relative">
        <h2 class="text-3xl font-bold text-center mb-8">What our Customers Are Saying</h2>

        <!-- Testimonial Carousel -->
        <div class="flex justify-center items-center relative">
            <!-- Left Arrow -->
            <button id="prevTestimonial" class="text-gray-400 hover:text-gray-800 transition absolute left-0 z-10">
                &lt;
            </button>

            <!-- Testimonial Cards Container -->
            <div class="flex space-x-4 items-center">
                <!-- Left side card (dimmed) -->
                <div class="testimonial-card opacity-50 transform scale-90 transition-all duration-300 ease-in-out bg-gray-100 p-4 rounded-lg text-center" id="leftCard">
                    <p class="text-gray-600 mb-2">"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
                    <p class="font-bold">Edward Abunda Jr.</p>
                </div>

                <!-- Center card (active one) -->
                <div class="testimonial-card transform scale-100 transition-all duration-300 ease-in-out bg-white shadow-lg p-6 rounded-lg text-center" id="centerCard">
                    <div class="flex justify-center mb-4">
                        <span class="text-red-500 text-2xl">★★★★★</span>
                    </div>
                    <p class="text-gray-600 mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam."</p>
                    <p class="font-bold">Edward Abunda Jr.</p>
                </div>

                <!-- Right side card (dimmed) -->
                <div class="testimonial-card opacity-50 transform scale-90 transition-all duration-300 ease-in-out bg-gray-100 p-4 rounded-lg text-center" id="rightCard">
                    <p class="text-gray-600 mb-2">"Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                    <p class="font-bold">John Doe</p>
                </div>
            </div>

            <!-- Right Arrow -->
            <button id="nextTestimonial" class="text-gray-400 hover:text-gray-800 transition absolute right-0 z-10">
                &gt;
            </button>
        </div>
    </div>
</div>

<x-footer></x-footer>

<style>
    .testimonial-card {
        min-width: 300px;
        transition: transform 0.5s ease, opacity 0.5s ease;
        }

        /* Add a fade-in and fade-out effect to simulate card change */
        .fade-enter {
            opacity: 0;
            transform: scale(0.9);
        }
        .fade-enter-active {
            opacity: 1;
            transform: scale(1);
        }
        .fade-exit {
            opacity: 1;
            transform: scale(1);
        }
        .fade-exit-active {
            opacity: 0;
            transform: scale(0.9);
        }

        button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 2rem;
        }

           .typing-animation {
    font-family: monospace;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
    border-right: 3px solid black;
    width: 0;
    animation:
        typing 3.5s steps(14) forwards,
        blink 0.75s step-end infinite;
}

@keyframes typing {
    from { width: 0; }
    to { width: 14ch; }
}

@keyframes blink {
    50% { border-color: transparent; }
    100% { border-color: black; }
}

/* Add this new animation for the width reset */
@keyframes reset-width {
    from { width: 14ch; }
    to { width: 0; }
}




</style>



    <script>
        const testimonials = [
            {
                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                author: "Edward Abunda Jr.",
                stars: 5
            },
            {
                text: "Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                author: "John Doe",
                stars: 4
            },
            {
                text: "Excepteur sint occaecat cupidatat non proident.",
                author: "Jane Smith",
                stars: 5
            },
            {
                text: "Ut enim ad minim veniam, quis nostrud exercitation.",
                author: "Mark Spencer",
                stars: 4
            }
        ];

        let currentIndex = 1;  // Start with the second testimonial
        const leftCard = document.getElementById('leftCard');
        const centerCard = document.getElementById('centerCard');
        const rightCard = document.getElementById('rightCard');
        const prevTestimonial = document.getElementById('prevTestimonial');
        const nextTestimonial = document.getElementById('nextTestimonial');

        // Function to update card content
        function updateCards() {
            const prevIndex = (currentIndex === 0) ? testimonials.length - 1 : currentIndex - 1;
            const nextIndex = (currentIndex === testimonials.length - 1) ? 0 : currentIndex + 1;

            // Update left, center, and right cards
            leftCard.querySelector('p').textContent = testimonials[prevIndex].text;
            leftCard.querySelector('.font-bold').textContent = testimonials[prevIndex].author;

            centerCard.querySelector('p').textContent = testimonials[currentIndex].text;
            centerCard.querySelector('.font-bold').textContent = testimonials[currentIndex].author;

            rightCard.querySelector('p').textContent = testimonials[nextIndex].text;
            rightCard.querySelector('.font-bold').textContent = testimonials[nextIndex].author;
        }

        // Apply transition with smooth fade and replace
        function smoothTransition(isNext = true) {
            centerCard.classList.add('fade-exit-active');
            setTimeout(() => {
                currentIndex = isNext ?
                    (currentIndex === testimonials.length - 1 ? 0 : currentIndex + 1) :
                    (currentIndex === 0 ? testimonials.length - 1 : currentIndex - 1);

                updateCards();
                centerCard.classList.remove('fade-exit-active');
                centerCard.classList.add('fade-enter-active');
                setTimeout(() => {
                    centerCard.classList.remove('fade-enter-active');
                }, 500); // Match the transition duration
            }, 500); // Time it with CSS fade-out duration
        }

        // Handle Next button click
        nextTestimonial.addEventListener('click', () => {
            smoothTransition(true);
        });

        // Handle Previous button click
        prevTestimonial.addEventListener('click', () => {
            smoothTransition(false);
        });

        // Initial card update
        updateCards();


      function restartTypingAnimation() {
    const typingElement = document.getElementById('typingText');

    // Reset the animation
    typingElement.style.animation = 'none';
    void typingElement.offsetWidth;

    // First, apply only the blinking cursor during the pause
    typingElement.style.animation = 'blink 0.75s step-end infinite';
    typingElement.style.width = '14ch'; // Keep text visible during pause

    // After pause, reset width and restart full animation
    setTimeout(() => {
        typingElement.style.width = '0';
        void typingElement.offsetWidth;
        typingElement.style.animation =
            'typing 3.5s steps(14) forwards, blink 0.75s step-end infinite';
    }, 5000);
}

// Start the cycle every 8.5 seconds (3.5s typing + 5s pause)
setInterval(restartTypingAnimation, 8500);



    </script>

    <!-- AOS Initialization -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
            AOS.init({
                once: false,  // Ensure animations play every time elements are scrolled into view
                duration: 1200,  // Animation duration (in milliseconds)
                easing: 'ease-out',  // Easing type for smooth animation
                offset: 120,  // Offset value to trigger animation earlier/later in view
            });
   </script>


</x-layout>
