// A TOGGLE BUTTON TO SHOW AND HIDE PASSWORD

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
