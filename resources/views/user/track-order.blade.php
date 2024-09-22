<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-20 w-5/6">
            <div class="py-10 px-20 font-bold text-3xl">
                My Orders
            </div>
            <div class="px-10 py-5">
                <ul class="flex cursor-pointer border-b-2 w-fit relative">
                    <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">All Orders</li>
                    <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">Pending</li>
                    <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">Baking</li>
                    <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">To Receive</li>
                    <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20 ">To Review</li>
                    <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">Completed</li>
                    <li class="order-tab px-5 py-2 font-semibold hover:text-[#F55447] z-20">Canceled</li>

                    {{-- <li id="selected-tab" class="absolute h-full border-b-2 border-red-500 bg-[#eaeaea] rounded-t-lg text-red-500"></li> --}}
                </ul>

                <table class="table-fixed w-full">
                    <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody>
                    <tbody class="order-content"></tbody>

                    @foreach ($items as $item)
                        <x-track-order-item :item="$item" class="order-{{ $item->status }}"></x-track-order-item>
                    @endforeach
                </table>

                <div id="empty-msg" class="{{ count($items) == 0 ? '':'hidden' }}">
                    <br>
                    <div class="text-center mt-10 italic text-xl">
                        Your Order List is empty ;(
                        <br><br>
                        <a href="/user/cart" class="underline text-red-500">go to cart</a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function()
        {
            moveItems();
            tabs[0].classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');
        });

        let tabs = document.querySelectorAll('.order-tab');
        let contents = document.querySelectorAll('.order-content');

        let pending = document.querySelectorAll('.order-pending');
        let baking = document.querySelectorAll('.order-baking');
        let receive = document.querySelectorAll('.order-receive');
        let review = document.querySelectorAll('.order-review');
        let completed = document.querySelectorAll('.order-completed');
        let canceled = document.querySelectorAll('.order-canceled');
        let empty = document.querySelector('#empty-msg');

        tabs.forEach((element, index) => {
            element.addEventListener('click', function() {
                tabs.forEach((e, i) => {
                    e.classList.remove('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');
                });
                element.classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');

                hideContents();
                showContent(index-1);
                showEmptyMsg(index-1)
            });
        });

        function hideContents() {
            contents.forEach(element => {
                element.classList.add('hidden');
            });
        }
        function showContent(selectedTabIndex) {
            if (selectedTabIndex === -1) {
                contents.forEach(element => {
                    element.classList.remove('hidden');
                });
            } else {
                contents[selectedTabIndex].classList.remove('hidden');
            }
        }
        function moveItems() { // move pending to pending tab, baking to baking tab ...
            contents.forEach((parent, index) => {
                if (index === 0) {
                    pending.forEach(child => {
                        parent.appendChild(child);
                    })
                }
                else if (index === 1) {
                    baking.forEach(child => {
                        parent.appendChild(child);
                    })
                }
                else if (index === 2) {
                    receive.forEach(child => {
                        parent.appendChild(child);
                    })
                }
                else if (index === 3) {
                    review.forEach(child => {
                        parent.appendChild(child);
                    })
                }
                else if (index === 4) {
                    completed.forEach(child => {
                        parent.appendChild(child);
                    })
                }
                else if (index === 5) {
                    canceled.forEach(child => {
                        parent.appendChild(child);
                    })
                }
            })
        }

        function showEmptyMsg(selectedTabIndex) {
            empty.classList.remove('hidden');
            if (selectedTabIndex == -1) {
                for(let i = 0; i < contents.length; i++) {
                    let content = contents[i];
                    if (content.children.length != 0) {
                        empty.classList.remove('hidden');
                        break;
                    }
                }
            } else {
                if (contents[selectedTabIndex].children.length == 0) {
                    empty.classList.remove('hidden');
                }
            }
        }

    </script>

</x-layout>
