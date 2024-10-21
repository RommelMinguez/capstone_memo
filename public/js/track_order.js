document.addEventListener('DOMContentLoaded', function()
{
    tabs[0].classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');
});

let tabs = document.querySelectorAll('.order-tab');
let contents = document.querySelectorAll('.order-content');

let empty = document.querySelector('#empty-msg');
let countIndicator = document.querySelectorAll('.number-indicator');

tabs.forEach((element, index) => {
    element.addEventListener('click', function() {
        tabs.forEach((e, i) => {
            e.classList.remove('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');
        });
        element.classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');

        hideContents();
        showContent(index-1);
        showEmptyMsg(index-1);
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

function showEmptyMsg(selectedTabIndex) {
    empty.classList.remove('hidden');
    if (selectedTabIndex == -1) {
        for(let i = 0; i < contents.length; i++) {
            let content = contents[i];
            if (content.children.length != 0) {
                empty.classList.add('hidden');
                break;
            }
        }
    } else {
        if (contents[selectedTabIndex].children.length != 0) {
            empty.classList.add('hidden');
        }
    }
}




// DETAILS
let detailsContent = document.getElementById('order-detail-content');

let orderID = document.getElementById('order-id');
let orderItem = document.getElementById('order-item').cloneNode(true);
let orderItem_display = document.getElementById('display-order-item');

let deliveryDate = document.getElementById('delivery-date');
let address = document.getElementById('address');
let paymentMethod = document.getElementById('payment-method');
let total = document.getElementById('total');
let getTotal = 0;

let cancelOrder_form = document.getElementById('cancel-order-form');
let isPending = true;
// let writeReview = document.getElementById('write-review');
// let isCompleted = true;

function showDetails(data) {
    detailsContent.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    orderID.textContent = data['order']['id'];
    paymentMethod.children[0].textContent = data['order']['payment_method'];
    displayItems(data['order']['order_items']);
    displayAddressData(data['order']['address']);
    displayDateData(data['order']);
    total.textContent = getTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    cancelOrder_form.classList.remove('hidden');
    // writeReview.classList.remove('hidden');

    if (isPending) {
        cancelOrder_form.action = '/user/cancel-order/' + data['id'];
    } else {
        cancelOrder_form.classList.add('hidden');
    }

    // if (isCompleted) {
    //     writeReview.href = '/cakes/' + data['cake']['id'] + "#ratingAndReviews";
    // } else {
    //     writeReview.classList.add('hidden');
    // }
}
function hideDetails() {
    detailsContent.classList.add('hidden');
    document.body.style.overflow = 'auto';
}

let bgColorArr = {
    pending: 'bg-yellow-500',
    baking: 'bg-orange-500',
    receive: 'bg-green-500',
    completed: 'bg-blue-500',
    canceled:'bg-red-500'
};

function displayItems(items) {
    orderItem_display.innerHTML = '';
    getTotal = 0;
    isPending = true;
    // isCompleted = true;
    Object.values(items).forEach(values => {
        let clone = orderItem.cloneNode(true);
        let subTotal = values['quantity'] * values['cake']['price'];
        getTotal += subTotal;

        clone.children[0].children[0].children[0].src = (values['cake']['image_src']).replace('public/', '/storage/');
        clone.children[1].children[0].children[0].children[0].textContent =  values['cake']['name'];
        clone.children[1].children[0].children[0].children[1].textContent =  'x' + values['quantity'];
        clone.children[1].children[0].children[1].children[0].textContent =  (values['cake']['price']).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        clone.children[1].children[0].children[3].children[0].textContent =  values['age'];
        clone.children[1].children[0].children[4].children[0].textContent =  values['candle_type'];
        clone.children[1].children[0].children[5].children[0].textContent =  values['dedication'];
        clone.children[2].children[0].children[1].children[0].textContent =  subTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        clone.children[2].children[0].children[0].children[1].textContent = values['status'];
        clone.children[2].children[0].children[0].children[1].classList.add(bgColorArr[values['status']]);

        if (values['status'] != 'pending' && isPending) isPending = false;
        // if (values['status'] != 'completed' && isCompleted) isCompleted = false;
        if (values['status'] == 'completed') {
            clone.children[1].children[0].children[6].children[0].href = '/cakes/' + values['cake']['id'] + '#ratingAndReviews';
            clone.children[1].children[0].children[6].children[0].classList.remove('hidden');
        }

        orderItem_display.appendChild(clone);
    });
}
function displayAddressData(addressData) {
    address.children[0].children[0].textContent = toTitleCase(addressData['name']);
    address.children[0].children[1].textContent = addressData['phone_number'];
    address.children[1].textContent = addressData['street_building'] + ((addressData['unit_floor']) ? ', '+addressData['unit_floor']:'');
    address.children[2].textContent = addressData['province'] + ', ' + addressData['city_municipality'] + ', ' + addressData['barangay'];
}
function displayDateData(dateData) {
    const date = new Date(dateData['prefered_date']+'T'+dateData['prefered_time']);
    deliveryDate.children[0].innerHTML= formatDateTime(date);
}

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
