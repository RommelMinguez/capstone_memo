let hide = document.getElementById('response');
let timeout;

document.addEventListener('DOMContentLoaded', function() {
    showResponse();

    hide.addEventListener('click', function() {
        clearTimeout(timeout);
        hide.classList.add('opacity-0');
        setTimeout(() => {
            hide.classList.remove('flex');
            hide.classList.add('hidden');
        }, 200);
    })
})

function showResponse() {
    timeout = setTimeout(() => {
        hide.classList.add('opacity-0');
        setTimeout(() => {
            hide.classList.remove('flex');
            hide.classList.add('hidden');
        }, 200);
    }, 5000);
}
