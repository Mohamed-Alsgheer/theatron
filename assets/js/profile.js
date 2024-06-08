/* handling popups */
let popups = document.querySelectorAll(".popup");
let content = document.querySelectorAll(".content");
let changeBtns = Array.from(document.querySelectorAll(".change-details"));
let closeBtns = Array.from(document.querySelectorAll(".close-btn"));
let cancelBtns = Array.from(document.querySelectorAll(".cancel-btn"));

//make buttons open and close the popups
changeBtns.forEach((btn) => btn.onclick = () => togglePopups(changeBtns, btn));
closeBtns.forEach((btn) => btn.onclick = () => togglePopups(closeBtns, btn));
cancelBtns.forEach((btn) => btn.onclick = () => togglePopups(cancelBtns, btn));

//function to open and close popups
function togglePopups(arr, btn) {
    let index = arr.indexOf(btn);
    console.log(index)
    popups[index].classList.toggle("active");
    content[index].classList.toggle("active");
}

/* check form's errors before sending the data */
let newName = document.getElementById("new-name");
let nameForm = document.getElementById("name-form");
let passForm = document.getElementById("pass-form");
let newPass = document.getElementById("new-pass");
let confirmPass = document.getElementById("confirm-pass");
let errMessages = document.querySelectorAll(".error-msg");
let validChars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l',
'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'z', '0', '1', '2',
'3', '4', '5', '6', '7', '8', '9', '@', '.', '+', '-', '_'];

//check edit username form
nameForm.onsubmit = (e) => {
    //check username validation
    for(let i = 0; i < newName.value.length; i++) {
        if(!validChars.find(c => c === newName.value[i])) {
            console.log("test");
            e.preventDefault();
            errMessages[0].classList.add("active");
            break;
        }
    }
}

//check edit password form
passForm.onsubmit = (e) => {
    //check password validation
    if(newPass.value.length <= 8) {
        e.preventDefault();
        errMessages[1].classList.add("active");
    }
    
    //check confirm password
    if(confirmPass.value !== newPass.value) {
        e.preventDefault();
        errMessages[2].classList.add("active");
    }
}