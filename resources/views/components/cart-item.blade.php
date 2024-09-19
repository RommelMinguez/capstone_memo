@props(['item'])

<tr class="border-y-2 cart-row">
    <td class="text-center">
        <input checked title="Select Item" name="order[]" form="form-order" type="checkbox" data-price="{{ $item->cake->price * $item->quantity }}" value="{{ $item->id }}" class="w-8 h-8 text-[#F44336] cursor-pointer cart-check-box">
    </td>
    <td class="p-5 m-auto">
        <div class="w-48 h-48 shadow-md">
            <a href="/cakes/{{ $item->cake->id }}"><img src="{{ $item->cake->image_src }}" alt="cake" class="w-full h-full object-cover " ></a>
        </div>
    </td>
    <td class="px-5">
        <ol>
            <li class="font-semibold text-xl "><a href="/cakes/{{ $item->cake->id }}" class="hover:underline font-localLobster">{{ $item->cake->name }}</a></li><br>
            <li>
                <div class="mb-2 flex items-center justify-start w-fit">
                    <span >Age:</span>
                    <input class="ml-5 mr-10 w-20 bg-[#EDE7E7]  rounded-md font-mono  pl-4 pr-1 py-1 text-center  shadow-md border inline-block item-age" required  type="number"  name="age" value="{{ $item->age }}" min="1" max="150">

                    <span >Candle:</span>
                    <select  name="candle"  required class="mx-5 w-40 py-1 bg-[#EDE7E7] rounded-md shadow-md border px-3 item-candle">
                        <option value="none" {{ $item->candle_type == 'none' ? 'selected':'' }} >None</option>
                        <option value="number candle" {{ $item->candle_type == 'number candle' ? 'selected':'' }}>Number Candle</option>
                        <option value="simple candle" {{ $item->candle_type == 'simple candle' ? 'selected':'' }}>Simple Candle</option>
                        <option value="other" {{ $item->candle_type == 'other' ? 'selected':'' }}>Other</option>
                    </select>
                </div>

                <textarea
                    class="w-3/4 my-1 bg-[#EDE7E7] rounded-md p-2 shadow-md item-dedication" required
                    name="dedication"  cols="30" rows="2" placeholder="Happy Birthday!!" title="Dedication/Message">{{ $item->dedication }}</textarea>
            </li>
        </ol>
    </td>
    <td class="text-center">
        <div class="flex shadow-md cursor-pointer w-fit rounded-md overflow-hidden border m-auto">
            <div class="w-10 h-10 text-[#F44336] bg-white font-mono text-3xl font-bold text-center  hover:text-2xl active:text-3xl select-none minus-quantity" >&minus;</div>
            <input class="w-14 h-10 bg-[#EDE7E7] font-bold font-mono text-xl pl-4 text-center inline-block quantity" readonly type="number"  name="quantity" value="{{ $item->quantity }}" min="1" max="99">
            <div class="w-10 h-10 text-[#F44336] bg-white font-mono text-3xl font-bold text-center  hover:text-2xl active:text-3xl select-none plus-quantity" >&plus;</div>
        </div>
        {{-- <div class="font-semibold text-2xl">
            {{ $item->quantity }}
        </div> --}}
    </td>
    <td class="text-center">
        <div class="text-xl font-bold text-[#F44336]">
            <span class="mr-1 text-2xl">&#8369;</span>
            {{ $item->cake->price }}
        </div>
    </td>
    <td class="text-center">
        {{-- <button title="Edit Item" type="button" class="bg-blue-500 w-10 h-10 rounded-md shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden hover:outline outline-1 outline-black hover:scale-90">
            <svg
                class="w-7 h-7 m-auto"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#fff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
            </svg>
        </button>
        <br> --}}
        <form action="/user/cart" method="POST" class="form-remove">
            @csrf
            @method('PATCH')
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <button title="Remove Item" type="button" class="show-modal bg-red-500 w-10 h-10 rounded-md shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden hover:outline outline-1 outline-black hover:scale-90">
                <svg
                    class="w-7 h-7 m-auto"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512">
                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#fff" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                </svg>
            </button>
        </form>
    </td>
</tr>


<div class="modal_confirmation hidden inset-0 bg-black bg-opacity-50 w-screen h-screen z-50 overflow-auto">
    <div class="w-full h-full flex justify-center items-center">
        <div class="border shadow-md px-10 py-5 rounded-lg bg-[#ffdab9]">
            <div class="flex justify-end">
                <button  type="button" class="close-modal bg-red-500 hover:bg-[#D22115] aspect-square w-7 rounded-sm shadow-md font-bold text-white text-3xl m-0 p-0 overflow-hidden">
                    <svg
                        class="aspect-square w-4 m-auto"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 384 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#fff" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                    </svg>
                </button>
            </div>
            <div class="font-semibold text-2xl pt-5 pb-10 text-red-500">
               Remove <span class="underline">{{ $item->cake->name }}</span> to the cart?
            </div>
            <div class="flex justify-center gap-5">
                <x-nav-link :isButton='true' type="button" class="confirm-remove">REMOVE</x-nav-link>
            </div>
        </div>
    </div>
</div>



{{-- <script>

    let closeModal = document.getElementById('cancel');
    let submitForm = document.getElementById('confirm');
    let modal = document.querySelectorAll('.modal_confirmation');

    submitForm.addEventListener('click', function() {
        modal.classList.remove('hidden');
        modal.classList.add('fixed');


    })
    closeModal.addEventListener('click', function() {
        modal.classList.remove('fixed');
        modal.classList.add('hidden');
    })

    cartItems.forEach((element, index) => {
        element.addEventListener('click', function() {
            if (checkBox[index].checked) {
                element.classList.add('bg-[#FEF6E4]');
            } else {
                element.classList.remove('bg-[#FEF6E4]');
            }
        })
    });
</script> --}}
