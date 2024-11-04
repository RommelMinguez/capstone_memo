


// // DETAILS
let detailsContent = document.getElementById('order-detail-content');

let orderID = document.getElementById('order-id');
let status_display = document.getElementById('status-display');
let orderItem = document.getElementById('order-item');
let orderItem_display = document.getElementById('display-order-item');
let cakeDescription = document.getElementById('cake-description');

let deliveryDate = document.getElementById('delivery-date');
let paymentMethod = document.getElementById('payment-method');


let textColorObj = {
    new: 'text-yellow-600',
    approved: 'text-yellow-600',
    pending: 'text-yellow-500',
    baking: 'text-orange-500',
    ready: 'text-green-500',
    completed: 'text-blue-500',
    canceled:  'text-red-500',
    rejected:  'text-red-500'
};

function showDetails(data) {
    detailsContent.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    currentOrderId = data.id;

    displayStatus(data);
    displayItems(data);
    cakeDescription.textContent = data['description'];
    displayTags(data['tags']);
    displayImages(data['custom_images']);
    displayGivenPrice(data.given_price, data.given_note, data.status);
    displayButtons(data.status);



}
function hideDetails() {
    detailsContent.classList.add('hidden');
    document.body.style.overflow = 'auto';
}


function displayStatus(data) {
    orderID.textContent = data['id'];
    status_display.textContent = data['status'].toUpperCase();
    Object.values(textColorObj).forEach(value => {
        status_display.classList.remove(value);
    });
    status_display.classList.add(textColorObj[data['status']]);
}

function displayItems(item) {
    orderItem.children[0].children[0].children[0].src = (item['image_src']).replace('public/', '/storage/');
    orderItem.children[1].children[0].children[0].children[0].textContent =  item['cake_name'];
    orderItem.children[1].children[0].children[1].textContent =  'x' + item['quantity'];
    orderItem.children[1].children[0].children[3].children[0].textContent =  item['age'];
    orderItem.children[1].children[0].children[4].children[0].textContent =  item['candle_type'];
    orderItem.children[1].children[0].children[5].children[0].textContent =  item['dedication'];
    orderItem.children[2].children[0].children[1].children[1].children[0].textContent =  Number(item.budget).toLocaleString('en-US');
}


let tagTemplate = document.getElementById('tag-template').cloneNode(true);

function displayTags(tags) {
    let tagsContainer = document.getElementById('tags-container');
    tagsContainer.innerHTML = '';
    tags.forEach(tag => {
        let clone = tagTemplate.cloneNode(true);
        clone.textContent = tag.name;
        tagsContainer.appendChild(clone);
    });
    if (tags.length == 0) {
        tagsContainer.innerHTML = '<div class="flex justify-center items-center h-full">No tags</div>';
    }
}

let imageTemplate = document.getElementById('image-template').cloneNode(true);

function displayImages(images) {
    let imagesContainer = document.getElementById('images-container');
    imagesContainer.innerHTML = '';
    images.forEach(image => {
        let clone = imageTemplate.cloneNode(true);
        clone.children[0].src = image.path.replace('public/', '/storage/');
        imagesContainer.appendChild(clone);
    });
    if (images.length == 0) {
        imagesContainer.innerHTML = '<div class="flex justify-center items-center h-full">No images</div>';
    }
}

let total_display = document.getElementById('total-display');
let total_note = document.getElementById('total-note');
let total_price = document.getElementById('total-price');
function displayGivenPrice(price, note, status) {
    total_display.classList.remove('hidden');
    if (status == 'new') {
        total_display.classList.add('hidden');
    } else {
        total_note.textContent = note;
        total_price.textContent = Number(price).toLocaleString('en-US');
    }
}

let buttonsResponse = document.getElementById('buttons-response');
function displayButtons(status) {
    Array.from(buttonsResponse.children).forEach(button => {
        button.classList.add("hidden");
    })
    if (status == 'new') {
        buttonsResponse.children[1].classList.remove('hidden');
    } else if (status == 'approved') {
        buttonsResponse.children[0].classList.remove('hidden');
        buttonsResponse.children[1].classList.remove('hidden');
    } else if (status == 'pending') {
        buttonsResponse.children[1].classList.remove('hidden');
    }
}



// TABS
document.addEventListener('DOMContentLoaded', function()
{
    tabs[0].classList.remove('bg-[#fbefd2]');
    tabs[0].classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'text-red-500');
    tabs[0].dispatchEvent(new Event('click'));
});

let tabs = document.querySelectorAll('.order-tab');
let contents = document.querySelectorAll('.order-content');

let empty = document.querySelector('#empty-msg');
// let countIndicator = document.querySelectorAll('.number-indicator');

tabs.forEach((element, index) => {
    element.addEventListener('click', function() {
        tabs.forEach((e, i) => {
            e.classList.remove('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'text-red-500');
            e.classList.add('bg-[#fbefd2]');
        });
        element.classList.remove('bg-[#fbefd2]');
        element.classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'text-red-500');

        hideContents();
        showContent(index);
        showEmptyMsg(index);
    });
});

function hideContents() {
    contents.forEach(element => {
        element.classList.add('hidden');
    });
}
function showContent(selectedTabIndex) {
    if (selectedTabIndex === 7) {
        contents.forEach(element => {
            element.classList.remove('hidden');
        });
    } else {
        contents[selectedTabIndex].classList.remove('hidden');
    }
}

function showEmptyMsg(selectedTabIndex) {
    empty.classList.remove('hidden');
    if (selectedTabIndex == 7) {
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






// CANCEL CONFIRMATION
let cancel_confirm_modal = document.getElementById('cancel-confirmation');

let placeOrder_btn = document.getElementById('response-status-order-btn');
let cancelConfirm_btn = document.getElementById('response-status-reject-btn');
let closeCancel_btn = document.getElementById('close-cancel');
let confirmCancel_btn = document.getElementById('confirm-cancel');

let cancel_confirm_form = document.getElementById('cancel-confirmation-form');
let placeOrder_form = document.getElementById('place-order-form');

let currentOrderId = null;
let hasSubmittedCancel = false;
let hasPlaceOrderSubmitted = false;

cancelConfirm_btn.addEventListener('click', function() {
    cancel_confirm_modal.classList.remove('hidden');
});

closeCancel_btn.addEventListener('click', function() {
    cancel_confirm_modal.classList.add('hidden');
});

confirmCancel_btn.addEventListener('click', function() {
    if (!hasSubmittedCancel) {
        hasSubmittedCancel = true;
        cancel_confirm_form.action += currentOrderId;
        cancel_confirm_form.submit();
    }
});

placeOrder_btn.addEventListener('click', function() {
    if (!hasPlaceOrderSubmitted) {
        hasPlaceOrderSubmitted = true;
        placeOrder_form.action += currentOrderId;
        placeOrder_form.submit();
    }
})
