const alertDiv = document.querySelector('.alertMessage');
const alertP = document.querySelector('#alert');

// Alert messages
const alert1 = "Your file is too big!";
const alert2 = "There was an error uploading your file!";
const alert3 = "You cannot upload files of this type!";

if (alertP.innerText === alert1 || alertP.innerText === alert2 || alertP.innerText === alert3) {
    alertDiv.style.backgroundColor = '#EF4444';
    setTimeout(() => {
        alertDiv.classList.add("fadeOut")
    }, 3000)
} else if (alertP.innerText == "Your file was successfully uploaded!") {
    alertDiv.style.backgroundColor = '#22C55E';
    setTimeout(() => {
        alertDiv.classList.add("fadeOut")
    }, 2000)
}

