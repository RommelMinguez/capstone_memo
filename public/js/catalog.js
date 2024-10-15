//FILTER-SEARCH
let filterShow = document.getElementById('filter-show');
let filterContent = document.getElementById('filter-content');

filterShow.addEventListener('click', function() {
    if(filterContent.classList.contains('hidden')) {
        filterContent.classList.remove('hidden');
        filterShow.classList.add('text-red-600', 'fill-red-600');
    } else {
        filterContent.classList.add('hidden');
        filterShow.classList.remove('text-red-600', 'fill-red-600');
    }
});


//  SHOW-HIDE CREATE FORM
let createForm = document.getElementById('createForm');
let showCreateForm = document.getElementById('addNew');
let closeCreateForm = document.getElementById('closeCreate');
// let closeEditTags = document.getElementById('closeEditTags');
// let returnEditTags = document.getElementById('returnEditTags');
// let showEditForm = document.getElementById('showEditForm');
// let editTagForm = document.getElementById('editTagForm');
let cakeForm = document.getElementById('cakeForm');

showCreateForm.addEventListener('click', function() {
    document.body.style.overflow = 'hidden';
    createForm.classList.remove('hidden');
});
closeCreateForm.addEventListener('click', function() {
    document.body.style.overflow = 'auto';
    createForm.classList.add('hidden');
});


// CREATE FORM IMAGE PREVIEW
const imageInput = document.getElementById('imageInput');
const imagePreview = document.getElementById('imagePreview');
const imageIcon = document.getElementById('imageIcon');
//const imageCard = document.getElementById('imageCard');
let reset_btn = document.getElementById('reset-button');
reset_btn.addEventListener('click', function() {
    imageInput.value = '';
    imageInput.dispatchEvent(new Event('change'));
    closeCreateForm.dispatchEvent(new Event('click'));
})

imageInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            imagePreview.src = event.target.result;
            imagePreview.classList.remove('hidden');

            imageIcon.classList.add('hidden');
            imageIcon.classList.add('bg-black', 'bg-opacity-70');
            imageIcon.children[0].classList.add('hidden');
            imageIcon.children[1].children[0].textContent = 'Change Image';
        };
        reader.readAsDataURL(file);
    } else {
        imagePreview.classList.add('hidden');

        imageIcon.classList.remove('hidden');
        imageIcon.classList.remove('bg-black', 'bg-opacity-50');
        imageIcon.children[0].classList.remove('hidden');
        imageIcon.children[1].children[0].textContent = 'Upload Image';

    }
});

// ADDITIONAL OPTION
let additionalOption = document.getElementById('additionalOption');

additionalOption.children[0].addEventListener('click', function() {
    if (additionalOption.children[1].classList.contains('hidden')) {
        this.children[1].classList.add('-rotate-90');
        additionalOption.children[1].classList.remove('hidden');
    } else {
        this.children[1].classList.remove('-rotate-90');

        additionalOption.children[1].classList.add('hidden');
        // additionalOption.children[1].classList.('translate-y-0');
    }
});


//DELETE
let showDelete_btn = document.querySelectorAll('.show-delete');
let delete_form = document.querySelector('#delete-form');
let delete_confirmation = document.querySelector('#delete-confirmation');
let closeDelete_btn = document.querySelector('#close-delete');
let cancelDelete_btn = document.querySelector('#cancel-delete');
let confirmDelete_btn = document.querySelector('#confirm-delete');

showDelete_btn.forEach((element, index) => {
    element.addEventListener('click', function() {
        delete_confirmation.classList.remove('hidden');
        delete_form.action = element.getAttribute('data-action');
    })
});
closeDelete_btn.addEventListener('click', function() {
    delete_confirmation.classList.add('hidden');
});
cancelDelete_btn.addEventListener('click', function() {
    closeDelete_btn.dispatchEvent(new Event('click'));
});
confirmDelete_btn.addEventListener('click', function() {
    delete_form.submit();
});


// UPDATE
let showUpdate_btn = document.querySelectorAll('.update-show');
let closeUpdate_btn = document.querySelector('#update-close');
let contentUpdate = document.querySelector('#update-content');
let contentUpdate_form = document.querySelector('#update-form');

let imageUpdate = document.querySelector('#update-image'); //[0]-div { [0][0]-icon, [0][1]-div { [0][1][0]-label, [0][1][1]-input }}, [1]-image
let updateImageIcon = imageUpdate.children[0].children[0];
let updateImageLabel = imageUpdate.children[0].children[1].children[0];
let updateImageInput = imageUpdate.children[0].children[1].children[1];
let updateImagePreview = imageUpdate.children[1];
let currentImagePreview_src = null;

let imageUpdate_inp = document.querySelector('#update-image-inp');
let nameUpdate_inp = document.querySelector('#update-name');
let priceUpdate_inp = document.querySelector('#update-price');
let descUpdate_inp = document.querySelector('#update-description');

let additionalOptionUpdate = document.querySelector('#update-additionalOption');
let resetUpdate_btn = document.querySelector('#update-reset-button');
let updateTagSelect = document.querySelectorAll('.updated-tag-select')


showUpdate_btn.forEach((element, index) => {
    let cakeData = JSON.parse(element.getAttribute('data-cake'));
    let cakeImage = element.getAttribute('data-cakeImage');
    let cakeTags = JSON.parse(element.getAttribute('data-tags'));

    element.addEventListener('click', function() {
        contentUpdate.classList.remove('hidden');
        contentUpdate_form.action = '/admin/catalog/' + cakeData['id'];
        nameUpdate_inp.value = cakeData['name'];
        priceUpdate_inp.value = cakeData['price'];
        descUpdate_inp.value = cakeData['description'];

        imageUpdate.children[0].classList.add('hidden');
        imageUpdate.children[0].classList.add('bg-black', 'bg-opacity-70');
        updateImageIcon.classList.add('hidden');
        updateImageLabel.textContent = 'Change Image';
        updateImagePreview.classList.remove('hidden');
        updateImagePreview.src = cakeImage;
        currentImagePreview_src = cakeImage;

        updateTagSelect.forEach((el, i) => {
            if (cakeTags.includes(+el.value)) {
                el.checked = true;
            } else {
                el.checked = false;
            }
        });
    });
});


closeUpdate_btn.addEventListener('click', function() {
    contentUpdate.classList.add('hidden');
});
resetUpdate_btn.addEventListener('click', function() {
    closeUpdate_btn.dispatchEvent(new Event('click'));
});

additionalOptionUpdate.children[0].addEventListener('click', function() {
    if (additionalOptionUpdate.children[1].classList.contains('hidden')) {
        this.children[1].classList.add('-rotate-90');
        additionalOptionUpdate.children[1].classList.remove('hidden');
    } else {
        this.children[1].classList.remove('-rotate-90');
        additionalOptionUpdate.children[1].classList.add('hidden');
    }
});


updateImageInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            updateImagePreview.src = event.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        updateImagePreview.src = currentImagePreview_src;
    }
});
