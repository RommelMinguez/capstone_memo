// Cake Description toggle show-more/less
let toggleDesc = document.getElementById('show-hide-desc');
let isShowMore = true;
let cakeDesc = document.getElementById('cake-desc');

toggleDesc.addEventListener('click', function() {

    if (isShowMore) {
        toggleDesc.textContent = "Show less";
        cakeDesc.style.height = 'fit-content';
        cakeDesc.style.boxShadow = 'inset 0px 0px 0px 0px black';
        isShowMore = !isShowMore;
    } else {
        toggleDesc.textContent = "Show more";
        cakeDesc.style.height = '36px';
        cakeDesc.style.boxShadow = 'inset 0px -5px 5px -5px gray';
        isShowMore = !isShowMore
    }

});

// Quantity Behavior
let quantityAdd = document.getElementById('plus-quantity');
let quantityMinus = document.getElementById('minus-quantity');
let quantity = document.getElementById('quantity');

quantityAdd.addEventListener('click', function() {
    quantity.value = (quantity.value >= 99) ? quantity.value:++quantity.value;
});
quantityMinus.addEventListener('click', function() {
    quantity.value = (quantity.value <= 1) ? quantity.value:--quantity.value;
});

// FORM SUBMIT
let buyNow = document.getElementById('submit-buy');
let cartAdd = document.getElementById('submit-cart');
let form = document.getElementById('form-inputs');

buyNow.addEventListener('click', function() {
    if (form.checkValidity()) {
        form.action = '/user/order/now';
        form.submit();
    }
    form.reportValidity();
});
if (cartAdd) {
    cartAdd.addEventListener('click', function() {
        if (form.checkValidity()) {
            form.action = '/user/cart';
            form.submit();
        }
        form.reportValidity();
    });
}

//SHOW MODAL
let modal = document.getElementById('modal_confirmation');
let closeModal = document.getElementById('cancel');

document.addEventListener('DOMContentLoaded', function() {
    if (!modal.classList.contains('hidden')) {
        document.body.style.overflow = 'hidden';
    }
});
closeModal.addEventListener('click', function() {
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
});
