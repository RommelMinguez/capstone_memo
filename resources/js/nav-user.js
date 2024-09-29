//toggle profile to show and hide

let profile = document.getElementById('profile');
let profile_more = document.getElementById('profile_more');
let profile_rotate = document.getElementById('profile_rotate');

if (profile) {
    profile.addEventListener('click', function() {
        if (profile_more.classList.contains('hidden')) {
            profile_more.classList.remove('hidden');
            profile_rotate.classList.add('-rotate-90')
        } else {
            profile_more.classList.add('hidden');
            profile_rotate.classList.remove('-rotate-90')
        }
    });
}

// manage order
let catalog = document.getElementById('catalog');
let catalog_more = document.getElementById('catalog_more');
let catalog_rotate = document.getElementById('catalog_rotate');

if (catalog) {
    catalog.addEventListener('click', function() {
        if (catalog_more.classList.contains('hidden')) {
            catalog_more.classList.remove('hidden');
            catalog_rotate.classList.add('-rotate-90')
        } else {
            catalog_more.classList.add('hidden');
            catalog_rotate.classList.remove('-rotate-90')
        }
    });
}
