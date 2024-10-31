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



//REVIEWS
let createReview_modal = document.getElementById('create-review');
let createReview_btn = document.getElementById('create-review-btn');
let closeReview_btn = document.getElementById('close-create-review');
let ratingFull_star = document.getElementById('rating-star-full') ? document.getElementById('rating-star-full') : null;
let ratingNone_star = document.getElementById('rating-star-none') ? document.getElementById('rating-star-none') : null;
let rating = document.getElementById('rating');
let rating_btn = document.querySelectorAll('.rating-btn');
let submitReview_btn = document.getElementById('submit-review');
let createReview_form = document.getElementById('create-review-form');
let isReviewSubmitted = false;

let updateReview_modal = document.getElementById('update-review');
let updateReview_btn = document.getElementById('update-review-btn');
let closeUpdateReview_btn = document.getElementById('close-update-review');

if (createReview_btn) {
    createReview_btn.addEventListener('click', function() {
        createReview_modal.classList.remove('hidden');
    });

    closeReview_btn.addEventListener('click', function() {
        createReview_modal.classList.add('hidden');
    })
}

if (closeUpdateReview_btn) {
    updateReview_btn.addEventListener('click', function() {
        updateReview_modal.classList.remove('hidden');
    });

    closeUpdateReview_btn.addEventListener('click', function() {
        updateReview_modal.classList.add('hidden');
    })
}

rating_btn.forEach((element, index) => {
    element.addEventListener('click', function() {
        rating.value = index+1;

        rating_btn.forEach((star, score) => {
            star.innerHTML = '';
            if (score <= index) {
                star.appendChild(ratingFull_star.cloneNode(true));
            } else {
                star.appendChild(ratingNone_star.cloneNode(true));
            }
        })
    });
})

if (submitReview_btn) {
    submitReview_btn.addEventListener('click', function() {
        createReview_form.reportValidity();
        if (rating.value == '') {
            alert('please rate and write a comment.');
        } else if (createReview_form.checkValidity() && !isReviewSubmitted) {
            createReview_form.submit();
            isReviewSubmitted = true;
        }
    });
}
