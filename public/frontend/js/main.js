$(document).ready(function () {
    const mobilenav = () => {
        let wrapper = document.querySelector(".nawrapper");

        if (wrapper) {
        }
    };

    mobilenav();

    const footerLink = () => {
        let wrapper = document.querySelector(".footer");

        if (wrapper) {
        }
    };

    footerLink();

    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: [
            `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" fill="#637381" fill-opacity="0.1"/>
                <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#637381"/>
                <path d="M14.4697 24.4697C14.1768 24.7626 14.1768 25.2374 14.4697 25.5303L19.2426 30.3033C19.5355 30.5962 20.0104 30.5962 20.3033 30.3033C20.5962 30.0104 20.5962 29.5355 20.3033 29.2426L16.0607 25L20.3033 20.7574C20.5962 20.4645 20.5962 19.9896 20.3033 19.6967C20.0104 19.4038 19.5355 19.4038 19.2426 19.6967L14.4697 24.4697ZM35 24.25L15 24.25V25.75L35 25.75V24.25Z" fill="#637381"/>
            </svg>`,
            `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                <rect x="-0.5" y="0.5" width="49" height="49" rx="24.5" transform="matrix(-1 0 0 1 49 0)" fill="#637381" fill-opacity="0.1"/>
                <rect x="-0.5" y="0.5" width="49" height="49" rx="24.5" transform="matrix(-1 0 0 1 49 0)" stroke="#637381"/>
                <path d="M35.5303 24.4697C35.8232 24.7626 35.8232 25.2374 35.5303 25.5303L30.7574 30.3033C30.4645 30.5962 29.9896 30.5962 29.6967 30.3033C29.4038 30.0104 29.4038 29.5355 29.6967 29.2426L33.9393 25L29.6967 20.7574C29.4038 20.4645 29.4038 19.9896 29.6967 19.6967C29.9896 19.4038 30.4645 19.4038 30.7574 19.6967L35.5303 24.4697ZM15 24.25L35 24.25V25.75L15 25.75V24.25Z" fill="#637381"/>
            </svg>`,
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });

    $(document).ready(function () {
        $(".customNiceSelect").niceSelect();
    });

    flatpickr("#Appointment", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // file upload and delete dropzone

    function dropzoneInitialization({
        inputField,
        dropzoneArea,
        imageContainer,
    }) {
        const input = document.querySelector(inputField);
        const dropzone = document.querySelector(dropzoneArea);
        const imagewrapper = document.querySelector(imageContainer);
        let dataTransfer = new DataTransfer();

        input?.addEventListener('change', handleFiles);

        if (dropzone) {
            dropzone.addEventListener('dragover', (event) => {
                event.preventDefault();
                dropzone.classList.add('dragover');
            });

            dropzone.addEventListener('dragleave', () => {
                dropzone.classList.remove('dragover');
            });

            dropzone.addEventListener('drop', (event) => {
                event.preventDefault();
                dropzone.classList.remove('dragover');
                handleFiles(event);
            });
        }

        function handleFiles(event) {
            const files = event.dataTransfer ? event.dataTransfer.files : event.target.files;

            for (const file of files) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;

                    const removeBtn = document.createElement('span');
                    removeBtn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
              <path d="M11.9134 4.60769L4.07993 12.4809" stroke="#637381" stroke-width="1.93397" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M11.9398 12.4655L4.06006 4.6239" stroke="#637381" stroke-width="1.93397" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>`;
                    removeBtn.className = 'remove_img_btn';

                    removeBtn.addEventListener('click', () => {
                        const index = Array.from(dataTransfer.files).indexOf(file);
                        if (index > -1) {
                            dataTransfer.items.remove(index);
                            input.files = dataTransfer.files; // Update the input field's file list
                        }
                        imagewrapper.removeChild(imageItems); // Remove the image from the display
                    });

                    const imageItems = document.createElement('div');
                    imageItems.className = 'nr-image-box';
                    imageItems.appendChild(imgElement);
                    imageItems.appendChild(removeBtn);
                    imagewrapper.appendChild(imageItems);
                };

                reader.readAsDataURL(file);
                dataTransfer.items.add(file); // Add the file to the DataTransfer object
            }

            input.files = dataTransfer.files; // Update the input field's file list
        }
    }



    dropzoneInitialization({
        inputField: "#image_upload",
        dropzoneArea: "#image_upload_lable",
        imageContainer: "#image--Uploader--wrapper",
    });
});

function isiOS() {
    return /iPhone|iPad|iPod/i.test(navigator.userAgent);
}

if (isiOS()) {
    // Select all videos and apply necessary attributes
    document.querySelectorAll('video').forEach(video => {
        video.controls = false; // Disable controls
        video.setAttribute('playsinline', 'true'); // Ensure inline playback
        video.setAttribute('webkit-playsinline', 'true'); // For older iOS versions
        video.removeAttribute('controls'); // Explicitly remove controls attribute
        video.muted = true; // Ensure it's muted
    });
}

function photoClickerChange() {
    let photoItem = document.querySelectorAll('.product--details--left--item')
    let imageOutput = document.querySelector('.product--details--left--preview--img')

    photoItem.forEach((item) => {
        item?.addEventListener('click', function () {
            imageOutput.innerHTML = item.innerHTML
        })
    })
}

photoClickerChange()

function counter() {

    let counterUp = document.querySelectorAll('.counter--down')
    let counterDown = document.querySelectorAll('.counter--up')



    counterUp.forEach((item) => {
        item?.addEventListener('click', function () {
            console.log(item.parentNode)
            let input = item.parentNode.querySelector('input')
            input.value++
        })
    })

    counterDown.forEach((item) => {
        item?.addEventListener('click', function () {
            let input = item.parentNode.querySelector('input')
            if (input.value <= 0) {
                input.value = 0;
            } else {
                input.value--
            }
        })
    })


}

counter()


document.getElementById("uploadIcon")?.addEventListener("click", function () {
    // Trigger the file input click when the icon is clicked
    document.getElementById("fileInput").click();
});

document.getElementById("fileInput")?.addEventListener("change", function (event) {
    // Get the selected file
    const file = event.target.files[0];

    // Check if a file was selected
    if (file) {
        const reader = new FileReader();

        // When the file is loaded, set it as the source of the profile image
        reader.onload = function (e) {
            document.getElementById("profilePic").src = e.target.result;
        };

        // Read the image file as a data URL
        reader.readAsDataURL(file);
    }
});




// for header

const openMobileHeader = (toggleBtn) => {
    const btns = document.querySelectorAll(toggleBtn);
    btns.forEach((btn) => {
        btn.addEventListener("click", (event) => {
            event.stopPropagation(); // Prevent the click from triggering the document listener
            const actionBox = btn.parentNode.querySelector(
                ".mobile-header-routes"
            );

            // Toggle the current action box
            actionBox.classList.toggle("active");

            // Close other action boxes
            document
                .querySelectorAll(".mobile-header-routes.active")
                .forEach((box) => {
                    if (box !== actionBox) {
                        box.classList.remove("active");
                    }
                });
        });
    });

    // Click outside to remove active class
    document.addEventListener("click", (event) => {
        document
            .querySelectorAll(".mobile-header-routes.active")
            .forEach((box) => {
                if (!box.contains(event.target)) {
                    box.classList.remove("active");
                }
            });
    });
};

openMobileHeader("#open-mobile-header");



function passHideShow() {
    let passInput = document.querySelectorAll('.passWordHideSHow')
    let hideShowBtn = document.querySelectorAll('.forget--pass--icon')



    hideShowBtn.forEach((btn, index) => {
        btn?.addEventListener('click', function () {
            let input = passInput[index];
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        });
    });
}

passHideShow()

