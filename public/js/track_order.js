document.addEventListener('DOMContentLoaded', function()
{
    tabs[1].classList.remove('bg-[#fbefd2]');
    tabs[1].classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'text-red-500');
});

let tabs = document.querySelectorAll('.order-tab');
let contents = document.querySelectorAll('.order-content');

let empty = document.querySelector('#empty-msg');
let countIndicator = document.querySelectorAll('.number-indicator');

tabs.forEach((element, index) => {
    element.addEventListener('click', function() {
        tabs.forEach((e, i) => {
            e.classList.remove('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'text-red-500');
            e.classList.add('bg-[#fbefd2]');
        });
        element.classList.remove('bg-[#fbefd2]');
        element.classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'text-red-500');

        hideContents();
        showContent(index-1);
        showEmptyMsg(index-1);
    });
});
tabs[1].dispatchEvent(new Event('click'));

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
showEmptyMsg(0);




// DETAILS
let detailsContent = document.getElementById('order-detail-content');

let orderID = document.getElementById('order-id');
let orderItem = document.getElementById('order-item').cloneNode(true);
let orderItem_display = document.getElementById('display-order-item');

let deliveryDate = document.getElementById('delivery-date');
let addressParent = document.getElementById('address').parentNode;
let addressOrigin = document.getElementById('address').cloneNode(true);
let paymentMethod = document.getElementById('payment-method');
let total = document.getElementById('total');
let getTotal = 0;

let cancelOrder_form = document.getElementById('cancel-order-form');
let orderStatus = document.getElementById('order-status');

// let isCompleted = true;

function showDetails(data) {
    detailsContent.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // console.log(data);


    displayOrder(data);
    paymentMethod.children[0].textContent = data['payment_method'];
    displayItems(data);
    displayAddressData(data['address'], data['payment_method']);
    displayDateData(data);
    total.textContent = getTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    cancelOrder_form.classList.remove('hidden');
    if (data.status == 'pending') {
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
    ready: 'bg-green-500',
    completed: 'bg-blue-500',
    canceled:'bg-red-500'
};


function displayOrder(order) {
    orderID.textContent = order['id'];
    orderStatus.textContent = order['status'].toUpperCase();
    Object.values(bgColorArr).forEach(color => orderStatus.classList.remove(color));
    orderStatus.classList.add(bgColorArr[order['status']]);
}


function displayItems(order) {
    let items = order.order_items;
    orderItem_display.innerHTML = '';
    getTotal = 0;
    // isPending = true;
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
        // clone.children[2].children[0].children[0].children[1].textContent = values['status'];
        // clone.children[2].children[0].children[0].children[1].classList.add(bgColorArr[values['status']]);

        // if (values['status'] != 'pending' && isPending) isPending = false;
        // if (values['status'] != 'completed' && isCompleted) isCompleted = false;
        if (order['status'] == 'completed') {
            clone.children[1].children[0].children[6].children[0].href = '/cakes/' + values['cake']['id'] + '#ratingAndReviews';
            clone.children[1].children[0].children[6].children[0].classList.remove('hidden');
            if (reviewsArr.includes(values.cake.id))
            clone.children[1].children[0].children[6].children[0].children[0].classList.add('hidden');
        }

        orderItem_display.appendChild(clone);
    });
}
function displayAddressData(addressData, payMethod) {
    addressParent.innerHTML = '';
    let address = addressOrigin.cloneNode(true);

    if (payMethod == 'cash on DELIVERY') {
        address.children[0].children[0].textContent = toTitleCase(addressData['name']);
        address.children[0].children[1].textContent = addressData['phone_number'];
        address.children[1].textContent = addressData['street_building'] + ((addressData['unit_floor']) ? ', '+addressData['unit_floor']:'');
        address.children[2].textContent = addressData['province'] + ', ' + addressData['city_municipality'] + ', ' + addressData['barangay'];
        addressParent.appendChild(address);
        addressParent.parentNode.classList.remove('hidden');
    } else {
        let textElement = document.createElement('span');
        textElement.textContent = 'N/A';
        addressParent.appendChild(textElement);
        addressParent.parentNode.classList.add('hidden');
    }
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
