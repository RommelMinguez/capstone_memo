// ORDER DETAILS
let orderDetail_show = document.querySelectorAll('.orderDetails');
let orderDetail_content = document.querySelector('#order-detail-content');
let orderDetail_close = document.querySelector('#close-order-detail');

let orderID = document.getElementById('order-id');

let customerInfo = document.getElementById('customer-info');
let deliveryDate = document.getElementById('delivery-date');
let address = document.getElementById('address');
let paymentMethod = document.getElementById('payment-method');








orderDetail_show.forEach((element, index) => {
    element.addEventListener('click', function() {
        orderDetail_content.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        let orderData = JSON.parse(element.getAttribute('data-order'));
        console.log(orderData);

        orderID.textContent = orderData['order']['id'];

        customerInfo.children[0].textContent = toTitleCase(orderData['order']['user']['first_name'] + ' ' + orderData['order']['user']['last_name']);
        customerInfo.children[1].textContent = orderData['order']['user']['email'];
        customerInfo.children[2].textContent = orderData['order']['user']['phone_number'];

        const date = new Date(orderData['order']['prefered_date']+'T'+orderData['order']['prefered_time']);
        deliveryDate.children[0].innerHTML= formatDateTime(date);

        address.children[0].children[0].textContent = toTitleCase(orderData['order']['address']['name']);
        address.children[0].children[1].textContent = orderData['order']['address']['phone_number'];
        address.children[1].textContent = orderData['order']['address']['street_building'] + ((orderData['order']['address']['unit_floor']) ? ', '+orderData['order']['address']['unit_floor']:'');
        address.children[2].textContent = orderData['order']['address']['province'] + ', ' + orderData['order']['address']['city_municipality'] + ', ' + orderData['order']['address']['barangay'];

        paymentMethod.children[0].textContent = orderData['order']['payment_method'];
    });
});
orderDetail_close.addEventListener('click', function() {
    orderDetail_content.classList.add('hidden');
    document.body.style.overflow = 'auto';
});






function formatDateTime(date) {
    const optionsDate = { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' };
    const optionsTime = { hour: 'numeric', minute: 'numeric', hour12: true };

    const formattedDate = date.toLocaleDateString('en-US', optionsDate);
    const formattedTime = date.toLocaleTimeString('en-US', optionsTime);

    return formattedDate + "<br>" + formattedTime;
}
function toTitleCase(str) {
    return str
        .toLowerCase() // Convert the string to lowercase first
        .split(' ')    // Split the string into words
        .map(word => word.charAt(0).toUpperCase() + word.slice(1)) // Capitalize the first letter of each word
        .join(' ');    // Join the words back into a single string
}




//I FORGOT
let tabs = document.querySelectorAll('.order-tab');
tabs.forEach((element, index) => {
    element.addEventListener('click', function() {
        tabs.forEach((e, i) => {
            e.classList.remove('border-b-2', 'border-red-500',  'bg-[#eedee4]', 'rounded-t-lg', 'text-red-500');
        });
        element.classList.add('border-b-2', 'border-red-500',  'bg-[#eedee4]', 'rounded-t-lg', 'text-red-500');
    });
});


// DATATABLES FILTER BY STATUS
$(document).ready(function() {
    // Initialize the DataTable
    var table = $('#order_all').DataTable();

    //Button to reset filter and show all records
    $('#reset-filter').on('click', function() {
        table.column(6).search('').draw(); // Clear the search to show all records
    });

    // Button to filter by  status
    $('#filter-pending').on('click', function() {
        table.column(6).search('pending').draw();
    });
    $('#filter-baking').on('click', function() {
        table.column(6).search('baking').draw();
    });
    $('#filter-receive').on('click', function() {
        table.column(6).search('receive').draw();
    });
    $('#filter-review').on('click', function() {
        table.column(6).search('review').draw();
    });
    $('#filter-completed').on('click', function() {
        table.column(6).search('completed').draw();
    });
    $('#filter-canceled').on('click', function() {
        table.column(6).search('canceled').draw();
    });
});
