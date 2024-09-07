<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-20 w-5/6">
            <div class="py-10 px-20 font-bold text-3xl">
                My Orders
            </div>
            <div class="px-10 py-5">
                <table class="table-fixed w-full">
                    @for($i = 0; $i < 3; $i++)
                        <x-track-order-item></x-track-order-item>
                    @endfor
                </table>
            </div>
        </main>
    </div>

</x-layout>
