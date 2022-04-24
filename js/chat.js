const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");



form.onsubmit = (e) => {
    e.preventDefault();
}



sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = ""; //once message sent into database, empty the input field
                scrollDown();
            }
        }
    }
    let formData = new FormData(form); // creating new formData Object
    xhr.send(formData); // sending formData to php
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(() => {
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains("active")) {
                    scrollDown();
                }
            }
        }
    }
    let formData = new FormData(form); // creating new formData Object
    xhr.send(formData); // sending formData to php
}, 200)

function scrollDown() {
    chatBox.scrollTop = chatBox.scrollHeight;
}