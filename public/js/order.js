// CONFIRM ORDER
let order = document.getElementById('order');
let confirmation = document.getElementById('confirmation');
let cancel = document.getElementById('cancel');

order.addEventListener('click', function() {
    confirmation.classList.remove('hidden');
    confirmation.classList.add('flex');
    document.body.style.overflow = 'hidden';


});
cancel.addEventListener('click', function() {
    confirmation.classList.add('hidden');
    confirmation.classList.remove('flex');
    document.body.style.overflow = 'auto';
});

//SCHEDULE DATE TIME
const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
const monthsOfYear = [
    'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
];
let buttonDate = document.querySelectorAll('.inp_date');
let deliveryDate = document.getElementById('delivery_date');
let buttonTime = document.querySelectorAll('.inp_time');
let deliveryTime = document.getElementById('delivery_time');

let confirmDate = document.getElementById('confirm-date');
let confirmTime = document.getElementById('confirm-time');
let confirmPayment = document.getElementById('confirm-payment');


document.addEventListener('DOMContentLoaded', function() {
    setDateTimeDefault();

    // date input
    buttonDate.forEach((element, index) => { //button real time content
        let today = new Date();
        today.setDate(today.getDate() + index);

        let dayLabel = 'Sunday';
        if (index == 0) dayLabel = 'Today';
        else if (index == 1) dayLabel = 'Tommorow';
        else dayLabel = daysOfWeek[today.getDay()];

        element.children[0].textContent = dayLabel;
        element.children[1].textContent = monthsOfYear[(today.getMonth())] + '/' + today.getDate() + '/' + today.getFullYear();

        element.addEventListener('click', function() { // button is clicked
            const formattedDate = today.toISOString().split('T')[0];
            deliveryDate.value = formattedDate;
            confirmDate.textContent = formattedDate;

            buttonDate.forEach((button, i) => {
                if (index == i) {
                    button.classList.add('bg-[#F44336]');
                    button.classList.add('text-white');
                } else {
                    button.classList.remove('bg-[#F44336]');
                    button.classList.remove('text-white');
                }
            });
        });
    });

    // time input
    buttonTime.forEach((element, index) => { //formated text content
        let hour = 8 + index;
        let format12 = hour > 12 ? hour-12:hour;
        element.children[0].textContent = String(format12).padStart(2,'0') + ':00';

        element.addEventListener('click', function() { // button is clicked
            let formattedHour = String(hour).padStart(2, '0');
            deliveryTime.value = formattedHour + ':00';
            confirmTime.textContent = deliveryTime.value;

            buttonTime.forEach((button, i) => {
                if (index == i) {
                    button.classList.add('bg-[#F44336]');
                    button.classList.add('text-white');
                } else {
                    button.classList.remove('bg-[#F44336]');
                    button.classList.remove('text-white');
                }
            });
        });
    });
});
//update button design
deliveryDate.addEventListener('change', function() {
    buttonDate.forEach(element => {
        element.classList.remove('bg-[#F44336]');
        element.classList.remove('text-white');
    })
});
deliveryTime.addEventListener('change', function() {
    buttonDate.forEach(element => {
        element.classList.remove('bg-[#F44336]');
        element.classList.remove('text-white');
    })
});
//set current date time as default value
function setDateTimeDefault() {
    let defaultDate = new Date();
    let formattedDate = defaultDate.toISOString().split('T')[0];
    deliveryDate.setAttribute('min',  formattedDate);
    deliveryDate.value = formattedDate;
    buttonDate[0].classList.add('bg-[#F44336]');
    buttonDate[0].classList.add('text-white');

    let hour = String(defaultDate.getHours()).padStart(2, '0');
    deliveryTime.value = hour + ':00';

    buttonPayment[1].classList.add('bg-[#F44336]');
    buttonPayment[1].classList.add('text-white');

    confirmDate.textContent = formattedDate;
    confirmTime.textContent = deliveryTime.value;
    confirmPayment.textContent = paymentMethod.value;
}


//PAYMENT METHOD INPUT
let buttonPayment = document.querySelectorAll('.inp_payment');
let paymentMethod = document.getElementById('payment_method');
buttonPayment.forEach((element, index) => {
    element.addEventListener('click', function() {
        paymentMethod.value = index == 0 ? 'COD':'PICK UP';
        confirmPayment.textContent = paymentMethod.value;

        buttonPayment.forEach((button, i) => {
            if (index == i) {
                button.classList.add('bg-[#F44336]');
                button.classList.add('text-white');
            } else {
                button.classList.remove('bg-[#F44336]');
                button.classList.remove('text-white');
            }
        });
    })
});
