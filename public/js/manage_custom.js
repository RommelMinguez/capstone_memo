
// // DETAILS
let detailsContent = document.getElementById('order-detail-content');

let orderID = document.getElementById('order-id');
let orderItem = document.getElementById('order-item');
let orderItem_display = document.getElementById('display-order-item');
let cakeDescription = document.getElementById('cake-description');

let deliveryDate = document.getElementById('delivery-date');
let paymentMethod = document.getElementById('payment-method');

let statusDisplay = document.getElementById('status-display');
let newRequest = document.getElementById('new-request');

let status_all = document.getElementById('status-set-all');


function showDetails(id) {
    detailsContent.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    document.getElementById('detail-loading').classList.remove('hidden');
    document.getElementById('detail-content-load').classList.add('hidden');

    getOrderData(id);
}
async function getOrderData(id) {
    try {
        const response = await fetch('/admin/custom/' + id);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        // console.log(data);


        currentOrderId = data.id;
        statusDisplay.textContent = data.status.toUpperCase();

        orderID.textContent = data['id'];
        displayItems(data);
        cakeDescription.textContent = data['description'];
        // displayTags(data['tags']);
        // displayImages(data['custom_images']);

        displayUserData(data.user);
        displayAddressData(data.address, data.payment_method)
        displayDateData(data['prefered_datetime']);
        displayPaymentMethod(data['payment_method']);

        newRequest.classList.add('hidden');
        status_all.parentNode.classList.add('hidden');
        statusDisplay.classList.add('text-yellow-600');
        if (data.status == 'new') {
            newRequest.classList.remove('hidden');
            document.getElementById('total-display').classList.add('hidden');
        } else if (data.status == 'approved')  {
            document.getElementById('total-display').classList.remove('hidden');
        } else {
            status_all.parentNode.classList.remove('hidden');
            status_all.value = data.status;
            status_all.classList.add(bgColorArr[status_all.selectedIndex]);
            statusDisplay.classList.remove('text-yellow-600');
            statusDisplay.classList.add(textColorArr[status_all.selectedIndex]);
            document.getElementById('total-display').classList.remove('hidden');
        }

        document.getElementById('total-note').textContent = data['given_note'];
        document.getElementById('total-price').textContent = data['given_price'];

        // hide loading show details
        document.getElementById('detail-loading').classList.add('hidden');
        document.getElementById('detail-content-load').classList.remove('hidden');
        return true;
    } catch (error) {
        console.error("Error fetching data:", error);
        throw error;
    }
}



let bgColorArr = ['bg-yellow-500', 'bg-orange-500', 'bg-green-500', 'bg-blue-500', 'bg-red-500'];
let textColorArr = ['text-yellow-500', 'text-orange-500', 'text-green-500', 'text-blue-500', 'text-red-500'];
status_all.addEventListener('change', function() {
    // reset and update color
    bgColorArr.forEach(bg => {
        this.classList.remove(bg);
    });
    this.classList.add(bgColorArr[this.selectedIndex]);

    textColorArr.forEach(bg => {
        statusDisplay.classList.remove(bg);
    });
    statusDisplay.textContent = this.value.toUpperCase();
    statusDisplay.classList.add(textColorArr[this.selectedIndex]);

    // update datatable
    var row = table.row(function(idx, data, node) { // which row?
        return data.id == currentOrderId.toString();
    });
    table.cell(row, 4).data(this.value).draw(); // update and redraw
    // console.log(row);

    updateStatus(currentOrderId, {item: this.value});
});

async function updateStatus(id, data) {
    // console.log(data);

    try {
        const response = await fetch('/admin/custom/' + id, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const updatedData = await response.json();

        // console.log(updatedData);
        updateFilterCount();

        return updatedData;
    } catch (error) {
        console.error("Error fetching data:", error);
        throw error;
    }
}




function hideDetails() {
    detailsContent.classList.add('hidden');
    document.body.style.overflow = 'auto';
}


function displayItems(item) {
    orderItem.children[0].children[0].children[0].src = (item['image_src']).replace('public/', '/storage/');
    orderItem.children[1].children[0].children[0].children[0].textContent =  item['cake_name'];
    orderItem.children[1].children[0].children[1].textContent =  'x' + item['quantity'];
    orderItem.children[1].children[0].children[3].children[0].textContent =  item['age'];
    orderItem.children[1].children[0].children[4].children[0].textContent =  item['candle_type'];
    orderItem.children[1].children[0].children[5].children[0].textContent =  item['dedication'];
    if (item['given_price']) {
        orderItem.children[2].children[0].children[1].classList.remove('hidden');
        orderItem.children[2].children[0].children[1].children[1].children[0].textContent =  Number(item.given_price).toLocaleString('en-US');
    } else {
        orderItem.children[2].children[0].children[1].classList.add('hidden');
    }
}


// let tagTemplate = document.getElementById('tag-template').cloneNode(true);

// function displayTags(tags) {
//     let tagsContainer = document.getElementById('tags-container');
//     tagsContainer.innerHTML = '';
//     tags.forEach(tag => {
//         let clone = tagTemplate.cloneNode(true);
//         clone.textContent = tag.name;
//         tagsContainer.appendChild(clone);
//     });
//     if (tags.length == 0) {
//         tagsContainer.innerHTML = '<div class="flex justify-center items-center h-full">No tags</div>';
//     }
// }

// let imageTemplate = document.getElementById('image-template').cloneNode(true);

// function displayImages(images) {
//     let imagesContainer = document.getElementById('images-container');
//     imagesContainer.innerHTML = '';
//     images.forEach(image => {
//         let clone = imageTemplate.cloneNode(true);
//         clone.children[0].src = image.path.replace('public/', '/storage/');
//         imagesContainer.appendChild(clone);
//     });
//     if (images.length == 0) {
//         imagesContainer.innerHTML = '<div class="flex justify-center items-center h-full">No images</div>';
//     }
// }

function displayUserData(userData) {
    let customerInfo = document.getElementById('customer-info');

    customerInfo.children[0].children[1].textContent = toTitleCase(userData['first_name'] + ' ' + userData['last_name']);
    customerInfo.children[1].children[1].textContent = userData['email'];
    customerInfo.children[2].children[1].textContent = userData['phone_number'];
}

function displayAddressData(addressData, payMethod) {
    let address = document.getElementById('address');
    if (payMethod == 'cash on PICK UP' || payMethod == null) {
        address.parentNode.parentNode.classList.add('hidden');
    } else {
        address.parentNode.parentNode.classList.remove('hidden');
        address.children[0].children[0].textContent = toTitleCase(addressData['name']);
        address.children[0].children[1].textContent = addressData['phone_number'];
        address.children[1].textContent = addressData['street_building'] + ((addressData['unit_floor']) ? ', '+addressData['unit_floor']:'');
        address.children[2].textContent = addressData['province'] + ', ' + addressData['city_municipality'] + ', ' + addressData['barangay'];
    }
}

function displayDateData(dateData) {
    // const date = new Date(dateData['prefered_date']+'T'+dateData['prefered_time']);
    // deliveryDate.children[0].innerHTML= formatDateTime(date);
    let deliveryDate = document.getElementById('delivery-date');

    if (dateData == null) {
        deliveryDate.parentNode.parentNode.classList.add('hidden');
    } else {
        deliveryDate.parentNode.parentNode.classList.remove('hidden');
        // deliveryDate.children[0].innerHTML= 'todo';

        const date = new Date(dateData.replace(" ", "T"));
        deliveryDate.children[0].innerHTML= formatDateTime(date);
    }
}

function displayPaymentMethod(payMethod) {
    let paymentMethodContainer = document.getElementById('payment-method');

    if (payMethod == null) {
        paymentMethodContainer.parentNode.classList.add('hidden');
    } else {
        paymentMethodContainer.parentNode.classList.remove('hidden');
        paymentMethodContainer.textContent = payMethod;

    }
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












// ORDER DETAILS RESPONSE
let currentOrderId = null;

let givenPrice_inp = document.getElementById('given_price');
let displayPriceSet = document.getElementById('display-price-set');
let approveStatus_btn = document.getElementById('response-status-confirm-btn');

let cusApproved_form = document.getElementById('custom-approved-form');
let resStatus_inp = document.getElementById('response-status');
let isResStatusSubmitted = false;

let cusRejected_form = document.getElementById('rejected-order-form');
let canceledStatus_btn = document.getElementById('response-status-reject-btn');
let isRejectedFormSubmitted = false;

approveStatus_btn.addEventListener('click', function() {
    if(!isResStatusSubmitted) {
        resStatus_inp.value = 'approved'
        cusApproved_form.reportValidity();
        if (cusApproved_form.checkValidity()) {
            cusApproved_form.action = cusApproved_form.action + '/' + currentOrderId;
            cusApproved_form.submit();
        }
    }
});
canceledStatus_btn.addEventListener('click', function() {
    if(!isRejectedFormSubmitted) {
        cusRejected_form.action = cusRejected_form.action + '/' + currentOrderId;
        cusRejected_form.submit();
    }
});

givenPrice_inp.addEventListener('input', function() {
    displayPriceSet.textContent = parseFloat(this.value).toFixed(2);
});






// TABS
let tabs = document.querySelectorAll('.order-tab');
tabs.forEach((element, index) => {
    element.addEventListener('click', function() {
        tabs.forEach((e, i) => {
            e.classList.remove('border-x-2', 'border-t-2', 'bg-gray-50', 'text-red-600');
        });
        element.classList.add('border-x-2', 'border-t-2', 'bg-gray-50', 'text-red-600');
        // element.classList.remove('border-b-2');???????
    });
});


function updateFilterCount() {
    let data = table.rows().data();
    let countStatus = {
        new: 0,
        approved: 0,
        pending: 0,
        baking: 0,
        ready: 0,
        completed: 0,
        canceled: 0,
        rejected: 0,
    }

    // count status
    const uniqueEntries = {};
    data.each(function(row) {
        const status = row.status;
        const uniqueKey = row.id;

        if (!uniqueEntries[status]) {
            uniqueEntries[status] = new Set();
        }

        if (!uniqueEntries[status].has(uniqueKey)) {
            uniqueEntries[status].add(uniqueKey);
            countStatus[status]++;
        }
    });

    // display status count
    document.getElementById('filter-new').children[0].textContent = countStatus['new'];
    document.getElementById('filter-approved').children[0].textContent = countStatus['approved'];
    document.getElementById('filter-pending').children[0].textContent = countStatus['pending'];
    document.getElementById('filter-baking').children[0].textContent = countStatus['baking'];
    document.getElementById('filter-ready').children[0].textContent = countStatus['ready'];
    document.getElementById('filter-completed').children[0].textContent = countStatus['completed'];
    document.getElementById('filter-canceled').children[0].textContent = countStatus['canceled'] + countStatus['rejected'];


    // show/hide red dot
    if (countStatus['new'] > 0) document.getElementById('filter-new').children[0].classList.remove('hidden');
    else document.getElementById('filter-new').children[0].classList.add('hidden');
    if (countStatus['approved'] > 0) document.getElementById('filter-approved').children[0].classList.remove('hidden');
    else document.getElementById('filter-approved').children[0].classList.add('hidden');
    if (countStatus['pending'] > 0) document.getElementById('filter-pending').children[0].classList.remove('hidden');
    else document.getElementById('filter-pending').children[0].classList.add('hidden');
    if (countStatus['baking'] > 0) document.getElementById('filter-baking').children[0].classList.remove('hidden');
    else document.getElementById('filter-baking').children[0].classList.add('hidden');
    if (countStatus['ready'] > 0) document.getElementById('filter-ready').children[0].classList.remove('hidden');
    else document.getElementById('filter-ready').children[0].classList.add('hidden');
    if (countStatus['completed'] > 0) document.getElementById('filter-completed').children[0].classList.remove('hidden');
    else document.getElementById('filter-completed').children[0].classList.add('hidden');
    if (countStatus['canceled'] > 0) document.getElementById('filter-canceled').children[0].classList.remove('hidden');
    else document.getElementById('filter-canceled').children[0].classList.add('hidden');
}

function defaultFilter() {
    switch (filterWord) {
        case 'approved':
            tabs[1].dispatchEvent(new Event('click'));
            document.getElementById('filter-pending').dispatchEvent(new Event('click'));
            break;
        case 'pending':
            tabs[2].dispatchEvent(new Event('click'));
            document.getElementById('filter-pending').dispatchEvent(new Event('click'));
            break;
        case 'baking':
            tabs[3].dispatchEvent(new Event('click'));
            document.getElementById('filter-baking').dispatchEvent(new Event('click'));
            break;
        case 'ready':
            tabs[4].dispatchEvent(new Event('click'));
            document.getElementById('filter-ready').dispatchEvent(new Event('click'));
            break;
        case 'completed':
            tabs[5].dispatchEvent(new Event('click'));
            document.getElementById('filter-completed').dispatchEvent(new Event('click'));
            break;
        case 'canceled':
            tabs[6].dispatchEvent(new Event('click'));
            document.getElementById('filter-canceled').dispatchEvent(new Event('click'));
            break;
        default:
            tabs[0].dispatchEvent(new Event('click'));
            document.getElementById('filter-new').dispatchEvent(new Event('click'));
    }
}
