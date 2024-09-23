// FOR LOGIN PAGE TOGGLE PASSWORD VISIBILITY
let password = document.querySelector('#password');
let togglePassword = document.querySelector('#show-hide-password');

togglePassword.addEventListener('mousedown', function() {
    password.type = 'text';
    togglePassword.children[1].classList.add('hidden');
    togglePassword.children[0].classList.remove('hidden');
});
togglePassword.addEventListener('mouseup', function() {
    password.type = 'password';
    togglePassword.children[1].classList.remove('hidden');
    togglePassword.children[0].classList.add('hidden');
});
