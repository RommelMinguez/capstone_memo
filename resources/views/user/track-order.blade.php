<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-20 w-5/6">
            <div class="py-10 px-20 font-bold text-3xl">
                My Orders
            </div>
            <div class="px-10 py-5">
                <ul class="flex cursor-pointer">
                    <li class="px-5 py-2 font-semibold hover:text-[#F55447]">All Orders</li>
                    <li class="px-5 py-2 font-semibold hover:text-[#F55447]">Pending</li>
                    <li class="px-5 py-2 font-semibold hover:text-[#F55447] border-b-2 border-red-500 bg-[#eaeaea] rounded-t-lg">Baking</li>
                    <li class="px-5 py-2 font-semibold hover:text-[#F55447] border-b-2 border-red-500 bg-[#eaeaea] rounded-t-lg">To Review</li>
                    <li class="px-5 py-2 font-semibold hover:text-[#F55447]">Completed</li>
                    <li class="px-5 py-2 font-semibold hover:text-[#F55447]">Canceled</li>
                </ul>

                <table class="table-fixed w-full">
                    @foreach($items as $item)
                        <x-track-order-item :item="$item"></x-track-order-item>
                    @endforeach
                </table>

                @if (count($items) == 0)
                    <br>
                    <div class="text-center mt-10 italic text-xl">
                        Your Order List is empty ;(
                        <br><br>
                        <a href="/user/cart" class="underline text-red-500">go to cart</a>
                    </div>
                @endif
            </div>
        </main>
    </div>

</x-layout>
