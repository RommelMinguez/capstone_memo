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
