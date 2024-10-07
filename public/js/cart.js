

 // CHECKBOX
 let checkBox = document.querySelectorAll('.cart-check-box');
 let cartItems = document.querySelectorAll('.cart-row');
 let subTotal = document.querySelectorAll('.sub-total');
//  let total = document.getElementById('total-price').getAttribute('data-total');
 let total = 0;
 let displayTotal = document.getElementById('display-total');
 document.addEventListener('DOMContentLoaded', function() {
     checkBox.forEach((element, index) => {
         if (element.checked) {
             cartItems[index].classList.add('bg-[#FEF6E4]');
         }

         total += priceArr[index]['price'] * priceArr[index]['quantity'];

         element.addEventListener('click', function() {
             if (element.checked) {
                 cartItems[index].classList.add('bg-[#FEF6E4]');
                 subTotal[index].classList.remove('hidden');

                //  total += +checkBox[index].getAttribute('data-price');
                 total += priceArr[index]['price'] * priceArr[index]['quantity'];
                 displayTotal.textContent = total.toFixed(2);
             } else {
                 cartItems[index].classList.remove('bg-[#FEF6E4]');
                 subTotal[index].classList.add('hidden');

                //  total -= +checkBox[index].getAttribute('data-price');
                 total -= priceArr[index]['price'] * priceArr[index]['quantity'];
                 displayTotal.textContent = total.toFixed(2);
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
         if (quantity[index].value < 99) quantity[index].dispatchEvent(new Event('input'));
         quantity[index].value = (quantity[index].value >= 99) ? quantity[index].value:++quantity[index].value;
     });
 });
 quantityMinus.forEach((element, index) => {
     element.addEventListener('click', function() {
         if (quantity[index].value > 1) quantity[index].dispatchEvent(new Event('input'));
         quantity[index].value = (quantity[index].value <= 1) ? quantity[index].value:--quantity[index].value;
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
            responseSuccess(index, values);
            console.log('item updated successfully.');
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

            //console.log(data);

            updateDatabase(index, data);

        }, 5000);
}
function responseSuccess(index, data) {
    //RESET RED TEXT AND LOADING ANIMATION
    itemAge[index].classList.remove('text-red-500');
    itemCandle[index].classList.remove('text-red-500');
    itemDedication[index].classList.remove('text-red-500');
    quantity[index].classList.remove('text-red-500');
    savingMsg[index].classList.add('hidden');

    // UPDATING SUBTOTAL
    priceArr[index]['quantity'] = data['quantity'];
    subTotal[index].children[0].children[0].textContent = priceArr[index]['quantity'];
    subTotal[index].children[1].children[0].textContent = (priceArr[index]['quantity'] * priceArr[index]['price']).toFixed(2);

    // UPDATING TOTAL
    total = 0;
    checkBox.forEach((element, ndx) => { // ndx is index in this block
        if (element.checked) {
            total += priceArr[ndx]['quantity'] * priceArr[ndx]['price'];
        }
    });
    displayTotal.textContent = total.toFixed(2);
}
