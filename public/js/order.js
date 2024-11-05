// CONFIRM ORDER
let order = document.getElementById("order");
let confirmation = document.getElementById("confirmation");
let cancel = document.getElementById("cancel");

order.addEventListener("click", function () {
    confirmation.classList.remove("hidden");
    confirmation.classList.add("flex");
    document.body.style.overflow = "hidden";
});
cancel.addEventListener("click", function () {
    confirmation.classList.add("hidden");
    confirmation.classList.remove("flex");
    document.body.style.overflow = "auto";
});

//SCHEDULE DATE TIME
const daysOfWeek = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
];
const monthsOfYear = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];
let buttonDate = document.querySelectorAll(".inp_date");
let deliveryDate = document.getElementById("delivery_date");
let buttonTime = document.querySelectorAll(".inp_time");
let deliveryTime = document.getElementById("delivery_time");
let isAdmin = deliveryDate.getAttribute("data-isAdmin") == 1 ? true : false;

let confirmDate = document.getElementById("confirm-date");
let confirmTime = document.getElementById("confirm-time");
let confirmPayment = document.getElementById("confirm-payment");

document.addEventListener("DOMContentLoaded", function () {
    setDateTimeDefault();

    // date input
    buttonDate.forEach((element, index) => {
        //button real time content
        let today = new Date();
        let dayLabel = "null";

        if (isAdmin) {
            today.setDate(today.getDate() + index);
            switch (index) {
                case 0:
                    dayLabel = "Today";
                    break;
                case 1:
                    dayLabel = "Tommorow";
                    break;
                default:
                    dayLabel = daysOfWeek[today.getDay()];
            }
        } else {
            today.setDate(today.getDate() + index + 1);
            switch (index) {
                case 0:
                    dayLabel = "Tommorow";
                    break;
                default:
                    dayLabel = daysOfWeek[today.getDay()];
            }
        }

        element.children[0].textContent = dayLabel;
        element.children[1].textContent =
            monthsOfYear[today.getMonth()] +
            "/" +
            today.getDate() +
            "/" +
            today.getFullYear();

        element.addEventListener("click", function () {
            // set input
            deliveryDate.value = formatDateForInp(today);
            // set confirmation modal content
            confirmDate.textContent = today.toLocaleDateString("en-PH", {
                year: "numeric",
                month: "long",
                day: "numeric",
                timeZone: "Asia/Manila",
            });

            buttonDate.forEach((button, i) => {
                if (index == i) {
                    button.classList.add("bg-[#F44336]");
                    button.classList.add("text-white");
                } else {
                    button.classList.remove("bg-[#F44336]");
                    button.classList.remove("text-white");
                }
            });
        });
    });

    // time input
    buttonTime.forEach((element, index) => {
        //formated text content
        let hour = 8 + index;
        let format12 = hour > 12 ? hour - 12 : hour;
        element.children[0].textContent =
            String(format12).padStart(2, "0") + ":00";

        element.addEventListener("click", function () {
            // button is clicked
            let formattedHour = String(hour).padStart(2, "0");
            deliveryTime.value = formattedHour + ":00";

            confirmTime.textContent = formatTime(deliveryTime.value);

            buttonTime.forEach((button, i) => {
                if (index == i) {
                    button.classList.add("bg-[#F44336]");
                    button.classList.add("text-white");
                } else {
                    button.classList.remove("bg-[#F44336]");
                    button.classList.remove("text-white");
                }
            });
        });
    });
});
//update button design and confirm details
deliveryDate.addEventListener("input", function () {
    let currentDate = new Date(deliveryDate.value);
    confirmDate.textContent = currentDate.toLocaleDateString("en-PH", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });

    buttonDate.forEach((element) => {
        element.classList.remove("bg-[#F44336]");
        element.classList.remove("text-white");
    });
});
deliveryTime.addEventListener("input", function () {
    confirmTime.textContent = formatTime(deliveryTime.value);

    buttonTime.forEach((element) => {
        element.classList.remove("bg-[#F44336]");
        element.classList.remove("text-white");
    });
});

function formatDateForInp(date) {
    const day = String(date.getDate()).padStart(2, "0");
    const month = String(date.getMonth() + 1).padStart(2, "0");
    return `${date.getFullYear()}-${month}-${day}`;
}

function formatTime(time) {
    let [hours, minutes] = time.split(":").map(Number);
    let ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12; // Convert 0 (midnight) or 12 (noon) to 12
    return `${hours}:${minutes < 10 ? "0" + minutes : minutes} ${ampm}`;
}

//set current date time as default value
function setDateTimeDefault() {
    let defaultDate = new Date();

    if (isAdmin) defaultDate.setDate(defaultDate.getDate());
    else defaultDate.setDate(defaultDate.getDate() + 1);

    deliveryDate.setAttribute("min", formatDateForInp(defaultDate));
    deliveryDate.value = formatDateForInp(defaultDate);
    buttonDate[0].classList.add("bg-[#F44336]");
    buttonDate[0].classList.add("text-white");

    // let hour = String(defaultDate.getHours()).padStart(2, '0');
    deliveryTime.value = "12:00";
    buttonTime[4].classList.add("bg-[#F44336]", "text-white");

    // buttonPayment[1].classList.add('bg-[#F44336]');
    // buttonPayment[1].classList.add('text-white');

    confirmDate.textContent = defaultDate.toLocaleDateString("en-PH", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
    confirmTime.textContent = "12:00 PM";
    // confirmPayment.textContent = paymentMethod.value;
}

//PAYMENT METHOD INPUT
let buttonPayment = document.querySelectorAll(".inp_payment");
let paymentMethod = document.getElementById("payment_method");
let address_container = document.getElementById("delivery_address_container");
let confirm_address_container = document.getElementById(
    "confirm-address-container"
);

let lbl = document.querySelectorAll(".span-label");

buttonPayment.forEach((element, index) => {
    element.addEventListener("click", function () {
        paymentMethod.value =
            index == 0 ? "cash on DELIVERY" : "cash on PICK UP";
        confirmPayment.textContent = paymentMethod.value;

        buttonPayment.forEach((button, i) => {
            if (index == i) {
                button.classList.add("bg-[#F44336]");
                button.classList.add("text-white");
            } else {
                button.classList.remove("bg-[#F44336]");
                button.classList.remove("text-white");
            }
        });
        // console.log("here");
        if (index == 1) {
            //if pick up hide address
            address_container.classList.add("hidden");
            confirm_address_container.classList.add("hidden");

            //change label to pickup
            document.getElementById("ngano").textContent = "ngano";

            console.log(lbl);
        } else {
            address_container.classList.remove("hidden");
            confirm_address_container.classList.remove("hidden");

            //change label to delivery
        }
    });
});
buttonPayment[1].dispatchEvent(new Event("click"));

//ADDRESS
let address_inp = document.getElementById("address-inp");
let displayedAddress = document.getElementById("display-address");
let displayedAddress_confirmation = document.getElementById("confirm-address");
let changeAddress_button = document.getElementById("change-address");
let closeAddress_button = document.getElementById("close-address");
let selectAddress = document.getElementById("choose-address");
let addressCard = document.querySelectorAll(".address-card");
let newAddress = null;

if (address_inp) {
    closeAddress_button.addEventListener("click", function () {
        selectAddress.classList.add("hidden");
        document.body.style.overflow = "auto";
    });
    changeAddress_button.addEventListener("click", function () {
        selectAddress.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    });
    addressCard.forEach((element, index) => {
        element.addEventListener("click", function () {
            newAddress = JSON.parse(element.getAttribute("data-address"));
            address_inp.value = newAddress["id"];
            address_inp.dispatchEvent(new Event("change"));
            closeAddress_button.dispatchEvent(new Event("click"));

            addressCard.forEach((el, i) => {
                el.classList.remove("bg-gray-100", "border-red-500");
                el.classList.add("bg-white");
                if (index == i) {
                    element.classList.remove("bg-white");
                    element.classList.add("bg-gray-100", "border-red-500");
                }
            });
        });
    });
    address_inp.addEventListener("change", function () {
        displayedAddress.children[0].children[0].textContent =
            newAddress["name"];
        displayedAddress.children[0].children[1].textContent =
            newAddress["phone_number"];
        displayedAddress.children[1].textContent =
            (newAddress["unit_floor"] ? newAddress["unit_floor"] + ", " : "") +
            newAddress["street_building"];
        displayedAddress.children[2].textContent =
            newAddress["province"] +
            ", " +
            newAddress["city_municipality"] +
            ", " +
            newAddress["barangay"];

        displayedAddress_confirmation.children[0].children[0].textContent =
            newAddress["name"];
        displayedAddress_confirmation.children[0].children[1].textContent =
            newAddress["phone_number"];
        displayedAddress_confirmation.children[1].textContent =
            (newAddress["unit_floor"] ? newAddress["unit_floor"] + ", " : "") +
            newAddress["street_building"];
        displayedAddress_confirmation.children[2].textContent =
            newAddress["province"] +
            ", " +
            newAddress["city_municipality"] +
            ", " +
            newAddress["barangay"];
    });
}

// CONFIRM ORDER
let confirm_button = document.getElementById("confirm-order-btn");
let confirm_form = document.getElementById("form-place-order");
let isOrderSubmitted = false;

confirm_button.addEventListener("click", function () {
    console.log(address_inp);
    // console.log(address_inp.value !== '');
    // console.log(address_inp.value !== null);
    console.log(paymentMethod.value == "cash on DELIVERY");

    if (!isOrderSubmitted) {
        if (paymentMethod.value == "cash on DELIVERY") {
            if (
                address_inp &&
                address_inp.value !== "" &&
                address_inp.value !== null
            ) {
                confirm_form.submit();
                isOrderSubmitted = true;
            } else {
                alert("Please add and select an address.");
            }
        } else {
            confirm_form.submit();
            isOrderSubmitted = true;
        }
    }

    // if (!isOrderSubmitted) {
    //     if (address_inp) {
    //         if (address_inp.value !== '' && address_inp.value !== null) {
    //             confirm_form.submit();
    //             isOrderSubmitted = true;
    //         } else {
    //             alert('Please add and select an address.');
    //         }
    //     } else {
    //         confirm_form.submit();
    //         isOrderSubmitted = true;
    //     }
    // }
});
