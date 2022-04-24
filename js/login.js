const form = document.querySelector(".login form");
continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault(); //preventing from submitting
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") {
                    location.href = "users.php";
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form); // creating new formData Object
    xhr.send(formData); // sending formData to php
}