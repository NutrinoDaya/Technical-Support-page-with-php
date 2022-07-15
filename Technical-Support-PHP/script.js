const form = document.querySelector("form")
StatusTxt = form.querySelector(".button-area span")

form.onsubmit = (e) => {
    e.preventDefault();
    StatusTxt.style.display = "block"
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "messege.php", true);
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let response = xhr.response;
            StatusTxt.innerText = response
                // if response is an error "Email and username fields are required"
                // we will change the color of the status text to red else reset the form
            if (response.indexOf("Email And Username Fields Are Required !") != -1 || response.indexOf("Please Enter A Valid Email Adress")) {
                StatusTxt.style.color = "red"
            } else {
                form.reset()
                setTimeout(() => {
                    StatusTxt.style.color = "none";

                }, 3000);
            }
        }
    }
    let formData = new FormData(form)
    xhr.send(formData)

}