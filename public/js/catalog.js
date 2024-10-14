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
})


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

    console.log(imageInput.value);

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
