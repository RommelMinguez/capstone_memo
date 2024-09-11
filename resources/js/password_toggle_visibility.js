let passInput = document.querySelectorAll('.toggle-password');
let passButton = document.querySelectorAll('.show-hide-password');

passButton.forEach((element, index) => {
    element.addEventListener('click', function() {
        let inp = passInput[index];
        if (inp.type === 'password') {
            inp.type = 'text';
            element.children[0].classList.remove('hidden');
            element.children[1].classList.add('hidden');
        } else {
            inp.type = 'password';
            element.children[0].classList.add('hidden');
            element.children[1].classList.remove('hidden');
        }
    });
});


// FOR LOGIN PAGE
let password = document.getElementById('password');
let togglePassword = document.getElementById('show-hide-password');

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

