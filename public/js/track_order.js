document.addEventListener('DOMContentLoaded', function()
{
    // moveItems();
    tabs[0].classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');
});

let tabs = document.querySelectorAll('.order-tab');
let contents = document.querySelectorAll('.order-content');

// let pending = document.querySelectorAll('.order-pending');
// let baking = document.querySelectorAll('.order-baking');
// let receive = document.querySelectorAll('.order-receive');
// let review = document.querySelectorAll('.order-review');
// let completed = document.querySelectorAll('.order-completed');
// let canceled = document.querySelectorAll('.order-canceled');
let empty = document.querySelector('#empty-msg');
let countIndicator = document.querySelectorAll('.number-indicator');

tabs.forEach((element, index) => {
    element.addEventListener('click', function() {
        tabs.forEach((e, i) => {
            e.classList.remove('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');
        });
        element.classList.add('border-b-2', 'border-red-500',  'bg-[#eaeaea]', 'rounded-t-lg', 'text-red-500');

        hideContents();
        showContent(index-1);
        showEmptyMsg(index-1);
    });
});

function hideContents() {
    contents.forEach(element => {
        element.classList.add('hidden');
    });
}
function showContent(selectedTabIndex) {
    if (selectedTabIndex === -1) {
        contents.forEach(element => {
            element.classList.remove('hidden');
        });
    } else {
        contents[selectedTabIndex].classList.remove('hidden');
    }
}
// function moveItems() { // move pending to pending tab, baking to baking tab ...
//     let count = 0;
//     contents.forEach((parent, index) => {
//         if (index === 0) {
//             pending.forEach(child => {
//                 parent.appendChild(child);
//                 count++;
//             });
//             addCountIndicator(count, index);
//             count = 0;
//         }
//         else if (index === 1) {
//             baking.forEach(child => {
//                 parent.appendChild(child);
//                 count++;
//             });
//             addCountIndicator(count, index);
//             count = 0;
//         }
//         else if (index === 2) {
//             receive.forEach(child => {
//                 parent.appendChild(child);
//                 count++;
//             });
//             addCountIndicator(count, index);
//             count = 0;
//         }
//         else if (index === 3) {
//             review.forEach(child => {
//                 parent.appendChild(child);
//                 count++;
//             });
//             addCountIndicator(count, index);
//             count = 0;
//         }
//         else if (index === 4) {
//             completed.forEach(child => {
//                 parent.appendChild(child);
//                 count++;
//             });
//             addCountIndicator(count, index);
//             count = 0;
//         }
//         else if (index === 5) {
//             canceled.forEach(child => {
//                 parent.appendChild(child);
//                 count++;
//             });
//             addCountIndicator(count, index);
//             count = 0;
//         }
//     })
// }

function showEmptyMsg(selectedTabIndex) {
    empty.classList.remove('hidden');
    if (selectedTabIndex == -1) {
        for(let i = 0; i < contents.length; i++) {
            let content = contents[i];
            if (content.children.length != 0) {
                empty.classList.add('hidden');
                break;
            }
        }
    } else {
        if (contents[selectedTabIndex].children.length != 0) {
            empty.classList.add('hidden');
        }
    }
}

// function addCountIndicator(count, index) {
//     if (count > 0) {
//         countIndicator[index].classList.remove('hidden');
//         countIndicator[index].textContent = count;
//     }
// }
