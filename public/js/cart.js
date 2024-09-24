

 // CHECKBOX
 let checkBox = document.querySelectorAll('.cart-check-box');
 let cartItems = document.querySelectorAll('.cart-row');
 let subTotal = document.querySelectorAll('.sub-total');
 let total = document.getElementById('total-price').getAttribute('data-total');
 let displayTotal = document.getElementById('display-total');
 document.addEventListener('DOMContentLoaded', function() {
     checkBox.forEach((element, index) => {
         if (element.checked) {
             cartItems[index].classList.add('bg-[#FEF6E4]');
         }
         element.addEventListener('click', function() {
             if (element.checked) {
                 cartItems[index].classList.add('bg-[#FEF6E4]');
                 subTotal[index].classList.remove('hidden');

                 total += +checkBox[index].getAttribute('data-price');
                 displayTotal.textContent = total;
             } else {
                 cartItems[index].classList.remove('bg-[#FEF6E4]');
                 subTotal[index].classList.add('hidden');

                 total -= +checkBox[index].getAttribute('data-price');
                 displayTotal.textContent = total;
             }
         })
     });
 });

 // REMOVE ITEMS
 let showModal = document.querySelectorAll('.show-modal');
 let closeModal = document.querySelectorAll('.close-modal');
 let modal = document.querySelectorAll('.modal_confirmation');
 let removeItem = document.querySelectorAll('.confirm-remove');
 let formRemove = document.querySelectorAll('.form-remove');
 showModal.forEach((element, index) => {
     element.addEventListener('click', function() {
         modal[index].classList.remove('hidden');
         modal[index].classList.add('fixed');
         document.body.style.overflow = 'hidden';
     });
 });

 closeModal.forEach((element, index) => {
     element.addEventListener('click', function() {
         modal[index].classList.remove('fixed');
         modal[index].classList.add('hidden');
         document.body.style.overflow = 'auto';
     });
 });
 removeItem.forEach((element, index) => {
     element.addEventListener('click', function() {
         formRemove[index].submit();
     });
 });

 // Quantity Behavior
 let quantityAdd = document.querySelectorAll('.plus-quantity');
 let quantityMinus = document.querySelectorAll('.minus-quantity');
 let quantity = document.querySelectorAll('.quantity');
 quantityAdd.forEach((element, index) => {
     element.addEventListener('click', function() {
         quantity[index].value = (quantity[index].value >= 99) ? quantity[index].value:++quantity[index].value;
         quantity[index].dispatchEvent(new Event('input'));
     });
 });
 quantityMinus.forEach((element, index) => {
     element.addEventListener('click', function() {
         quantity[index].value = (quantity[index].value <= 1) ? quantity[index].value:--quantity[index].value;
         quantity[index].dispatchEvent(new Event('input'));
     });
 });


 //EDIT DETAILS
 let itemAge = document.querySelectorAll('.item-age');
 let itemCandle = document.querySelectorAll('.item-candle');
 let itemDedication = document.querySelectorAll('.item-dedication');
 let savingMsg = document.querySelectorAll('.saving-msg');
 let updateTimeout = [];

 itemAge.forEach((element, index) => {
    element.addEventListener('input', function() {
        debounceItem(element, index);
    });
 });
 itemCandle.forEach((element, index) => {
    element.addEventListener('input', function() {
        debounceItem(element, index);
    });
 });
 itemDedication.forEach((element, index) => {
    element.addEventListener('input', function() {
        debounceItem(element, index);
    });
 });
 quantity.forEach((element, index) => {
    element.addEventListener('input', function() {
        debounceItem(element, index);
    });
 });

 async function updateDatabase(index, values) {
    try {
        const response = await fetch('/user/cart', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(values)
        });

        const data = await response.json();

        if (data['success']) {
            console.log(index);

            responseSuccess(index);
            console.log('updated');
        }

    } catch (error) {
        console.error('Error updating the database:', error);
    }
}

function debounceItem(element, index) {
    element.classList.add('text-red-500');
    savingMsg[index].classList.remove('hidden');

        clearTimeout(updateTimeout[index]);

        updateTimeout[index] = setTimeout(() => {

            let data = {
                id: checkBox[index].value,
                age: itemAge[index].value,
                candle_type: itemCandle[index].value,
                dedication: itemDedication[index].value,
                quantity: quantity[index].value
            };

            console.log(data);

            updateDatabase(index, data);

        }, 5000);
}
function responseSuccess(index) {
    itemAge[index].classList.remove('text-red-500');
    itemCandle[index].classList.remove('text-red-500');
    itemDedication[index].classList.remove('text-red-500');
    quantity[index].classList.remove('text-red-500');
    savingMsg[index].classList.add('hidden');
}
