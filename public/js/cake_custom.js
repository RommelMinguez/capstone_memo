// AI CONTENT
let aiShow_btn = document.getElementById("ai-show-button");
let aiClose_btn = document.getElementById("ai-close-button");
let ai_content = document.getElementById("ai-content");

let display_pollinations = document
    .getElementById("prompt-result-pollinations")
    .cloneNode(true);
let display_horde = document
    .getElementById("prompt-result-horde")
    .cloneNode(true);
let displayResult_parent = document.getElementById("prompt-result");
let generate_btn = document.getElementById("prompt-generate-btn");
let prompt_inp = document.getElementById("prompt-textarea");

let generated_pollination = document.getElementById("generated-pollinationsAI");
let generated_horde = document.getElementById("generated-hordeAI");
let generatedRecent = document.querySelectorAll(".generated-recent");

// let checkStatus_interval = null;
let isPollinationsDone = true;
let isHordeDone = true;




generatedRecent.forEach((element, index) => {
    element.addEventListener("click", function () {
        if (element.tagName === "BUTTON") {
            // If clicked element is a button, get the parent image
            const parentDiv = element.closest(".group");
            const img = parentDiv.querySelector("img");
            selectGeneratedImage(img);
        } else {
            // Original image click behavior
            selectGeneratedImage(element);
        }
    });
});

function selectGeneratedImage(imgEl) {
    imagePreview.src = imgEl.src;
    imagePreview.classList.remove("hidden");

    imageIcon.classList.add("hidden");
    imageIcon.classList.add("bg-black", "bg-opacity-70");
    imageIcon.children[0].classList.add("hidden");
    imageIcon.children[1].children[0].children[0].children[0].textContent =
        "Change Image";
    aiClose_btn.dispatchEvent(new Event("click"));

    ai_image_inp.value = imgEl.getAttribute("data-id");
    imageInput.value = null;

    document.getElementById('description').value = imgEl.getAttribute('data-prompt');;
}

aiShow_btn.addEventListener("click", function () {
    ai_content.classList.remove("hidden");
    document.body.style.overflow = "hidden";
});
aiClose_btn.addEventListener("click", function () {
    ai_content.classList.add("hidden");
    document.body.style.overflow = "auto";
});

generate_btn.addEventListener("click", function () {
    if (prompt_inp.textContent.trim() === "") {
        alert(
            "The prompt is a required field and cannot be left empty. Please provide a valid input."
        );
        return;
    }
    if (isPollinationsDone && isHordeDone) {
        displayResult_parent.innerHTML = "";

        let clone_pol = display_pollinations.cloneNode(true);
        let clone_hor = display_horde.cloneNode(true);
        let clone_hor2 = display_horde.cloneNode(true);

        displayResult_parent.appendChild(clone_pol);
        displayResult_parent.appendChild(clone_hor);
        displayResult_parent.appendChild(clone_hor2);
        clone_pol.classList.remove("hidden");
        clone_hor.classList.remove("hidden");
        clone_hor2.classList.remove("hidden");

        isPollinationsDone = false;
        isHordeDone = false;
        updatePromt();

        getPollinationAI(prompt_inp.textContent, clone_pol);
        getHordeAI(prompt_inp.textContent, clone_hor, clone_hor2);
    }
});

function updatePromt() {
    if (isPollinationsDone && isHordeDone) {
        generate_btn.classList.remove("bg-red-300");
        generate_btn.classList.add("hover:bg-red-600", "bg-red-500");
        prompt_inp.contentEditable = true;
        prompt_inp.classList.remove("text-gray-500");
    } else {
        generate_btn.classList.add("bg-red-300");
        generate_btn.classList.remove("hover:bg-red-600", "bg-red-500");
        prompt_inp.contentEditable = false;
        prompt_inp.classList.add("text-gray-500");
    }
}

async function getPollinationAI(dsc, display) {
    try {
        const response = await fetch(
            "https://image.pollinations.ai/prompt/" + dsc
        );

        if (!response.ok) throw new Error("Network response was not ok");

        const blob = await response.blob();
        const imageUrl = URL.createObjectURL(blob);

        const storedData = await storeImage(blob, dsc, "pollinations.ai");

        const imgElement = display.children[1].children[0];
        imgElement.src = imageUrl;
        imgElement.setAttribute("data-id", storedData.id);
        imgElement.setAttribute("data-prompt", dsc);
        display.children[1].classList.remove("loading-box");
        imgElement.addEventListener("click", function () {
            selectGeneratedImage(this);
        });
        isPollinationsDone = true;
        updatePromt();
    } catch (error) {
        console.error("Error fetching the image:", error);
        display.children[1].innerHTML = "Something went wrong.";
        isPollinationsDone = true;
        updatePromt();
    }
}
async function getHordeAI(dsc, display, display2) {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    try {
        const response = await fetch("/api/generate-horde", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({
                prompt: dsc,
            }),
        });

        // if (!response.ok) {
        //     const errorDetails = await response.json();
        //     throw new Error(`Error ${response.status}: ${errorDetails.error}`);
        // }
        if (!response.ok) {
            // Parse the error response as text
            const html = await response.text();

            // Display the HTML in a new window for easier reading
            const errorWindow = window.open();
            errorWindow.document.write(html);
            errorWindow.document.close();

            // Optionally, throw an error for additional handling
            throw new Error(`HTTP Error: ${response.status}`);
        }

        const data = await response.json();
        // checkStatus_interval = setInterval(() => {
        //     checkHordeStatus(data.id, dsc, display, display2);
        // }, 5000);
        let isChecking = false; // Flag to prevent overlapping calls
        const checkStatusInterval = setInterval(async () => {
            if (isChecking) return; // Skip if already running

            isChecking = true; // Set the flag to true
            const status = await checkHordeStatus(data.id, dsc, display, display2); // Wait for the result
            isChecking = false; // Reset the flag after completion

            if (status) {
                clearInterval(checkStatusInterval); // Stop the interval if the condition is met
                console.log("Horde status resolved.");
            }
        }, 5000);

        console.log("Generation Queued: " + data.id);

        return data;
    } catch (error) {
        console.error("Image generation failed:", error);
    }
}

async function checkHordeStatus(id, dsc, display, display2) {
    try {
        const response = await fetch("/api/generate-horde/status/" + id);

        // if (!response.ok) {
        //     const errorDetails = await response.json();
        //     throw new Error(
        //         `Error ${response.status}: ${
        //             errorDetails.message || errorDetails.error
        //         }`
        //     );
        // }
        if (!response.ok) {
            // Parse the error response as text
            const html = await response.text();

            // Display the HTML in a new window for easier reading
            const errorWindow = window.open();
            errorWindow.document.write(html);
            errorWindow.document.close();

            // Optionally, throw an error for additional handling
            throw new Error(`HTTP Error: ${response.status}`);
        }

        const data = await response.json();
        console.log("ETA: " + data.wait_time + "s");
        display.children[2].children[0].textContent = data.wait_time;
        display2.children[2].children[0].textContent = data.wait_time;

        if (data.faulted || !data.is_possible) {
            // clearInterval(checkStatus_interval);
            console.error("Something went wrong, image failed to generate.");
            isHordeDone = true;
            updatePromt();
            return true;
        }
        if (data.done) {
            // clearInterval(checkStatus_interval);
            console.log("AI Horde success: showing result");
            displayHordeImage(data.generations, dsc, display, display2);
            return true;
        }
        return false
    } catch (error) {
        console.error("Error checking generation status:", error);
    }
    return false;
}
async function displayHordeImage(gen, dsc, display, display2) {
    try {
        const response = await fetch(gen[0].img);
        const response2 = await fetch(gen[1].img);

        if (!response.ok) throw new Error("Network response was not ok");
        if (!response2.ok) throw new Error("Network response was not ok");

        const blob = await response.blob();
        const imageUrl = URL.createObjectURL(blob);
        const blob2 = await response2.blob();
        const imageUrl2 = URL.createObjectURL(blob2);

        const storedData = await storeImage(blob, dsc, "AI_Horde");
        const storedData2 = await storeImage(blob2, dsc, "AI_Horde");

        const imgElement = display.children[1].children[0];
        imgElement.src = imageUrl;
        imgElement.setAttribute("data-id", storedData.id);
        imgElement.setAttribute("data-prompt", dsc);
        display.children[1].classList.remove("loading-box");
        display.children[2].classList.add('hidden')
        imgElement.addEventListener("click", function () {
            selectGeneratedImage(this);
        });
        const imgElement2 = display2.children[1].children[0];
        imgElement2.src = imageUrl2;
        imgElement2.setAttribute("data-id", storedData2.id);
        imgElement2.setAttribute("data-prompt", dsc);
        display2.children[1].classList.remove("loading-box");
        display2.children[2].classList.add("hidden");
        imgElement2.addEventListener("click", function () {
            selectGeneratedImage(this);
        });
        isHordeDone = true;
        updatePromt();
    } catch (error) {
        console.error("Error fetching the image:", error);
    }
}

async function storeImage(imageBlob, prompt_dsc, ai_name) {
    try {
        const formData = new FormData();
        formData.append("image", imageBlob);
        formData.append("prompt", prompt_dsc);
        formData.append("ai_name", ai_name);

        const response = await fetch("/api/save-generated-image", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: formData,
        });

        if (!response.ok) {
            throw new Error(`Failed to store image: ${response.statusText}`);
        }

        const data = await response.json();

        console.log("Image stored successfully:", data["message"]);

        return data["storedData"];
    } catch (error) {
        console.error("Error storing image:", error);
    }
}

// AI PROMPT PLACEHOLDER

prompt_inp.addEventListener("input", () => {
    if (prompt_inp.textContent.trim() === "") {
        prompt_inp.textContent = null;
        prompt_inp.classList.add("placeholder");
        generate_btn.classList.add("bg-red-300");
        generate_btn.classList.remove("hover:bg-red-600", "bg-red-500");
    } else {
        prompt_inp.classList.remove("placeholder");
        generate_btn.classList.remove("bg-red-300");
        generate_btn.classList.add("hover:bg-red-600", "bg-red-500");
    }
});

// CUSTOM FORM IMAGE PREVIEW
const ai_image_inp = document.getElementById("ai_generated_image");
const imageInput = document.getElementById("imageInput");
const imagePreview = document.getElementById("imagePreview");
const imageIcon = document.getElementById("imageIcon");
//const imageCard = document.getElementById('imageCard');

imageInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            imagePreview.src = event.target.result;
            imagePreview.classList.remove("hidden");
            ai_image_inp.value = null;

            imageIcon.classList.add("hidden");
            imageIcon.classList.add("bg-black", "bg-opacity-70");
            imageIcon.children[0].classList.add("hidden");
            imageIcon.children[1].children[0].children[0].children[0].textContent =
                "Change Image";
        };
        reader.readAsDataURL(file);
    } else {
        imagePreview.classList.add("hidden");

        imageIcon.classList.remove("hidden");
        imageIcon.classList.remove("bg-black", "bg-opacity-50");
        imageIcon.children[0].classList.remove("hidden");
        imageIcon.children[1].children[0].children[0].children[0].textContent =
            "Upload Image";
    }
});

// CUSTOM CAKE ADDITIONAL OPTION
// let additionalOption = document.getElementById("additionalOption");

// additionalOption.children[0].addEventListener("click", function () {
//     if (additionalOption.children[1].classList.contains("hidden")) {
//         this.children[1].classList.add("-rotate-90");
//         additionalOption.children[1].classList.remove("hidden");
//     } else {
//         this.children[1].classList.remove("-rotate-90");

//         additionalOption.children[1].classList.add("hidden");
//         // additionalOption.children[1].classList.('translate-y-0');
//     }
// });

// additionalOption.children[0].dispatchEvent(new Event("click"));

// ADDITIONAL IMAGE
// const imageUpload = document.getElementById("image-upload");
// const previewContainer = document.getElementById("preview");
// const previewPlaceholder = document
//     .getElementById("preview-placeholder")
//     .cloneNode(true);

// // Use DataTransfer to manage the input files
// const dataTransfer = new DataTransfer();

// const imageClasses = [
//     "w-24",
//     "h-24",
//     "object-cover",
//     "rounded-lg",
//     "cursor-pointer",
// ];

// // Function to update the previews
// function updatePreviews() {
//     previewContainer.innerHTML = ""; // Clear previous previews

//     if (dataTransfer.files.length === 0) {
//         previewContainer.appendChild(previewPlaceholder);
//     }

//     Array.from(dataTransfer.files).forEach((file, index) => {
//         const reader = new FileReader();
//         reader.onload = (e) => {
//             const img = document.createElement("img");
//             img.src = e.target.result;
//             img.title = "click to remove image";
//             imageClasses.forEach((cls) => img.classList.add(cls));

//             // Remove image on click
//             img.addEventListener("click", () => {
//                 dataTransfer.items.remove(index); // Remove from DataTransfer
//                 imageUpload.files = dataTransfer.files; // Sync input files with DataTransfer
//                 updatePreviews();
//             });

//             previewContainer.appendChild(img);
//         };
//         reader.readAsDataURL(file);
//     });
// }

// // Event listener for file input
// imageUpload.addEventListener("change", (event) => {
//     const files = Array.from(event.target.files);

//     // Cancel selection if no files are chosen
//     if (files.length === 0) return;

//     // Add selected files to DataTransfer, limited to 5
//     files.slice(0, 5 - dataTransfer.files.length).forEach((file) => {
//         dataTransfer.items.add(file);
//     });

//     // Check if file limit is exceeded
//     if (dataTransfer.files.length > 5) {
//         alert("You can upload a maximum of 5 images.");
//         while (dataTransfer.files.length > 5) {
//             dataTransfer.items.remove(dataTransfer.files.length - 1);
//         }
//     }
//     console.log(dataTransfer);

//     imageUpload.files = dataTransfer.files; // Sync input files with DataTransfer
//     updatePreviews();
// });

// Quantity Behavior
let quantityAdd = document.getElementById("plus-quantity");
let quantityMinus = document.getElementById("minus-quantity");
let quantity = document.getElementById("quantity");

quantityAdd.addEventListener("click", function () {
    quantity.value = quantity.value >= 99 ? quantity.value : ++quantity.value;
});
quantityMinus.addEventListener("click", function () {
    quantity.value = quantity.value <= 1 ? quantity.value : --quantity.value;
});

// FORM SUBMITTION
let custom_form_submit = document.getElementById("custom-form-submit");
let custom_form = document.getElementById("custom_form");
let isSubmitted = false;

custom_form_submit.addEventListener("click", function () {
    let isValid = custom_form.reportValidity();
    let hasImage = imageInput.value != "";
    let hasImage_ai = ai_image_inp.value != "";

    console.log("upload: " + hasImage);
    console.log("ai: " + hasImage_ai);
    console.log("valid: " + isValid);

    if (isValid && (hasImage || hasImage_ai) && !isSubmitted) {
        isSubmitted = true;
        custom_form.submit();
    } else if (!hasImage && !hasImage_ai) {
        alert("Please upload your own image or generate one using AI.");
    }
});
