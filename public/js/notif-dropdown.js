
let notif_content = document.getElementById('notif-dropdown');
let notif_btn = document.getElementById('notification-btn');
let isNotifPage = notif_btn.getAttribute('data-isNotifPage');


notif_btn.addEventListener('click', function() {
    let isHidden = notif_content.classList.contains('hidden');
    if (isHidden) {
        notif_content.classList.remove('hidden');
    } else {
        notif_content.classList.add('hidden');
    }

    if (!isNotifPage && isHidden) {
        this.classList.add('bg-[#eec9a8]', 'font-semibold')
    } else if (!isNotifPage){
        this.classList.remove('bg-[#eec9a8]', 'font-semibold')
    }
});


