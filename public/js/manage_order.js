// ORDER DETAILS
let orderDetail_show = document.querySelectorAll('.orderDetails');
let orderDetail_content = document.querySelector('#order-detail-content');
let orderDetail_close = document.querySelector('#close-order-detail');

let orderID = document.getElementById('order-id');

let customerInfo = document.getElementById('customer-info');
let deliveryDate = document.getElementById('delivery-date');
let address = document.getElementById('address');
let paymentMethod = document.getElementById('payment-method');

let orderItem = document.getElementById('order-item').cloneNode(true);
let orderItem_display = document.getElementById('display-order-item');

let status_all = document.getElementById('status-set-all');
// let status_items = document.querySelectorAll('status-item');
let status_items = [];
let n = 0;

let totalOrder_label = document.getElementById('order-total');
let totalOrderAmount = 0;





orderDetail_show.forEach((element, index) => {
    element.addEventListener('click', function() {
        orderDetail_content.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        document.getElementById('detail-loading').classList.remove('hidden');
        document.getElementById('detail-content-load').classList.add('hidden');

        // let orderData = JSON.parse(element.getAttribute('data-order'));
        // console.log(element.getAttribute('data-id'));
        getOrderData(element.getAttribute('data-id'), element);

    });
});
orderDetail_close.addEventListener('click', function() {
    orderDetail_content.classList.add('hidden');
    document.body.style.overflow = 'auto';
});





let bgColorArr = ['bg-yellow-500', 'bg-orange-500', 'bg-green-500', 'bg-blue-500', 'bg-red-500'];
let isSettingDefault = true;


async function getOrderData(id, element) {
    try {
        const response = await fetch('/admin/orders/' + id);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const orderData = await response.json();
        // console.log(orderData);

        orderID.textContent = orderData['order']['id'];
        paymentMethod.children[0].textContent = orderData['order']['payment_method'];
        displayItems(orderData['order']['order_items'], element);
        displayUserData(orderData['order']['user']);
        displayAddressData(orderData['order']['address'], orderData['order']);
        displayDateData(orderData['order']);
        totalOrder_label.textContent = totalOrderAmount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        document.getElementById('detail-loading').classList.add('hidden');
        document.getElementById('detail-content-load').classList.remove('hidden');

        openedOrderId = orderData['order']['id'];
        status_all.value = orderData['order']['status'];
        //status_all.dispatchEvent(new Event('change'));


        return true;
    } catch (error) {
        console.error("Error fetching data:", error);
        throw error;
    }
}



let openedOrderId = null;
status_all.addEventListener('change', function() {
    bgColorArr.forEach(bg => {
        this.classList.remove(bg);
    });
    this.classList.add(bgColorArr[this.selectedIndex]);

    status_items.forEach((element, index) => {
        element.value = this.value;
    });
    status_items.forEach((element, index) => {
        element.dispatchEvent(new Event('change'));
    });

    updateStatus(openedOrderId, {item: this.value});
});

function displayItems(items, row) {
    orderItem_display.innerHTML = '';
    status_items = [];
    totalOrderAmount = 0;
    Object.values(items).forEach(values => {
        let clone = orderItem.cloneNode(true);

        let subTotal = values['quantity'] * values['cake']['price'];
        totalOrderAmount += subTotal;

        clone.children[0].children[0].children[0].src = formatImagePath(values['cake']['image_src']);
        clone.children[1].children[0].children[0].children[0].textContent =  values['cake']['name'];
        clone.children[1].children[0].children[0].children[1].textContent =  'x' + values['quantity'];
        clone.children[1].children[0].children[1].children[0].textContent =  values['cake']['price'];
        clone.children[1].children[0].children[3].children[0].textContent =  values['age'];
        clone.children[1].children[0].children[4].children[0].textContent =  values['candle_type'];
        clone.children[1].children[0].children[5].children[0].textContent =  values['dedication'];
        clone.children[2].children[0].children[1].children[0].textContent =  subTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        isSettingDefault = true;
        clone.children[2].children[0].children[0].children[1].addEventListener('change', function() {
            bgColorArr.forEach(bg => {
                this.classList.remove(bg);
            });
            this.classList.add(bgColorArr[this.selectedIndex]);

            if (!isSettingDefault) {
                var row = table.row(function(idx, data, node) {
                    return data[0] == values['id'].toString();
                });
                table.cell(row, 6).data(this.value).draw();

                updateStatusAll();
            }
        });
        clone.children[2].children[0].children[0].children[1].value = values['status'];
        clone.children[2].children[0].children[0].children[1].dispatchEvent(new Event('change'));
        status_items[n++] = clone.children[2].children[0].children[0].children[1]; //items select element


        isSettingDefault = false;
        orderItem_display.appendChild(clone);
    });

    // console.log(items);

    updateStatusAll();
    n = 0;
}

function displayUserData(userData) {
    customerInfo.children[0].children[1].textContent = toTitleCase(userData['first_name'] + ' ' + userData['last_name']);
    customerInfo.children[1].children[1].textContent = userData['email'];
    customerInfo.children[2].children[1].textContent = userData['phone_number'];
}

function displayAddressData(addressData, order) {
    if (order.payment_method == 'cash on PICK UP') {
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
    const date = new Date(dateData['prefered_date']+'T'+dateData['prefered_time']);
    deliveryDate.children[0].innerHTML= formatDateTime(date);
}


function formatImagePath(path) {
    return path.replace('public/', '/storage/');
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

async function updateStatus(id, data) {
    // console.log(data);

    try {
        const response = await fetch('/admin/order/' + id, {
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

function updateStatusAll() {
    if (status_items.length == 1) {
        status_all.value = status_items[0].value;
        bgColorArr.forEach(bg => {
            status_all.classList.remove(bg);
        });
        status_all.classList.add(bgColorArr[status_all.selectedIndex]);
    } else {
        for(let i = 0; i < status_items.length-1; i++) {
            if (status_items[i].value == status_items[i+1].value) {
                status_all.value = status_items[i].value;
                bgColorArr.forEach(bg => {
                    status_all.classList.remove(bg);
                });
                status_all.classList.add(bgColorArr[status_all.selectedIndex]);
            } else {
                status_all.value = '';
                bgColorArr.forEach(bg => {
                    status_all.classList.remove(bg);
                });
                status_all.classList.add('bg-[#D9D9D9]');
                break;
            }

        }
    }
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


let table = null;

// DATATABLES FILTER BY STATUS
$(document).ready(function() {
    // Initialize the DataTable
    table = $('#order_all').DataTable();

    //Button to reset filter and show all records
    $('#reset-filter').on('click', function() {
        table.column(7).search('').draw(); // Clear the search to show all records
    });

    // Button to filter by  status
    $('#filter-pending').on('click', function() {
        table.column(7).search('pending').draw();
        // let rowCount = table.rows({ filter: 'applied' }).count();
        // let filterPending = document.getElementById('filter-pending');
        // filterPending.children[0].textContent = rowCount;
        // filterPending.children[0].classList.remove('hidden');
    });
    $('#filter-baking').on('click', function() {
        table.column(7).search('baking').draw();
    });
    $('#filter-receive').on('click', function() {
        table.column(7).search('ready').draw();
    });
    // $('#filter-review').on('click', function() {
    //     table.column(7).search('review').draw();
    // });
    $('#filter-completed').on('click', function() {
        table.column(7).search('completed').draw();
    });
    $('#filter-canceled').on('click', function() {
        table.column(7).search('canceled').draw();
    });

    updateFilterCount();
    defaultFilter();
});


function updateFilterCount() {
    let data = table.rows().data();
    let countStatus = {
        pending: 0,
        baking: 0,
        ready: 0,
        // review: 0,
        completed: 0,
        canceled: 0,
    }

    // count status
    const uniqueEntries = {};
    data.each(function(row) {
        const status = row[7];
        const uniqueKey = row[1];

        if (!uniqueEntries[status]) {
            uniqueEntries[status] = new Set();
        }

        if (!uniqueEntries[status].has(uniqueKey)) {
            uniqueEntries[status].add(uniqueKey);
            countStatus[status]++;
        }
    });

    // display status count
    document.getElementById('filter-pending').children[0].textContent = countStatus['pending'];
    document.getElementById('filter-baking').children[0].textContent = countStatus['baking'];
    document.getElementById('filter-receive').children[0].textContent = countStatus['ready'];
    // document.getElementById('filter-review').children[0].textContent = countStatus['review'];
    document.getElementById('filter-completed').children[0].textContent = countStatus['completed'];
    document.getElementById('filter-canceled').children[0].textContent = countStatus['canceled'];

    // show/hide red dot
    if (countStatus['pending'] > 0) document.getElementById('filter-pending').children[0].classList.remove('hidden');
    else document.getElementById('filter-pending').children[0].classList.add('hidden');
    if (countStatus['baking'] > 0) document.getElementById('filter-baking').children[0].classList.remove('hidden');
    else document.getElementById('filter-baking').children[0].classList.add('hidden');
    if (countStatus['ready'] > 0) document.getElementById('filter-receive').children[0].classList.remove('hidden');
    else document.getElementById('filter-receive').children[0].classList.add('hidden');
    // if (countStatus['review'] > 0) document.getElementById('filter-review').children[0].classList.remove('hidden');
    // else document.getElementById('filter-review').children[0].classList.add('hidden');
    if (countStatus['completed'] > 0) document.getElementById('filter-completed').children[0].classList.remove('hidden');
    else document.getElementById('filter-completed').children[0].classList.add('hidden');
    if (countStatus['canceled'] > 0) document.getElementById('filter-canceled').children[0].classList.remove('hidden');
    else document.getElementById('filter-canceled').children[0].classList.add('hidden');

}


function defaultFilter() {
    switch (filterWord) {
        case 'pending':
            tabs[1].dispatchEvent(new Event('click'));
            document.getElementById('filter-pending').dispatchEvent(new Event('click'));
            break;
        case 'baking':
            tabs[2].dispatchEvent(new Event('click'));
            document.getElementById('filter-baking').dispatchEvent(new Event('click'));
            break;
        case 'receive':
            tabs[3].dispatchEvent(new Event('click'));
            document.getElementById('filter-receive').dispatchEvent(new Event('click'));
            break;
        case 'completed':
            tabs[4].dispatchEvent(new Event('click'));
            document.getElementById('filter-completed').dispatchEvent(new Event('click'));
            break;
        case 'canceled':
            tabs[5].dispatchEvent(new Event('click'));
            document.getElementById('filter-canceled').dispatchEvent(new Event('click'));
            break;
        default:
    }
}
