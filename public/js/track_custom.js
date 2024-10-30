


// // DETAILS
let detailsContent = document.getElementById('order-detail-content');

let orderID = document.getElementById('order-id');
let orderItem = document.getElementById('order-item');
let orderItem_display = document.getElementById('display-order-item');
let cakeDescription = document.getElementById('cake-description');

let deliveryDate = document.getElementById('delivery-date');
let paymentMethod = document.getElementById('payment-method');



function showDetails(data) {
    detailsContent.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    orderID.textContent = data['id'];
    displayItems(data);
    cakeDescription.textContent = data['description'];
    displayTags(data['tags']);
    displayImages(data['custom_images']);

    // cancelOrder_form.classList.remove('hidden');


}
function hideDetails() {
    detailsContent.classList.add('hidden');
    document.body.style.overflow = 'auto';
}


function displayItems(item) {
    orderItem.children[0].children[0].children[0].src = (item['image_src']).replace('public/', '/storage/');
    orderItem.children[1].children[0].children[0].children[0].textContent =  item['cake_name'];
    orderItem.children[1].children[0].children[0].children[1].textContent =  'x' + item['quantity'];
    orderItem.children[1].children[0].children[1].children[0].textContent =  (item['budget']).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    orderItem.children[1].children[0].children[3].children[0].textContent =  item['age'];
    orderItem.children[1].children[0].children[4].children[0].textContent =  item['candle_type'];
    orderItem.children[1].children[0].children[5].children[0].textContent =  item['dedication'];
    orderItem.children[2].children[0].children[1].children[0].textContent =  (item['budget'] * item['quantity']).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
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

