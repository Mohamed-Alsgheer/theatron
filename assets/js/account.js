let LoginForm = document.getElementById("LoginForm");
let RegForm = document.getElementById("RegForm");
let Indicator = document.getElementById("Indicator");

//transform functions//
function register() {
    RegForm.style.transform ="translateX(450px)";
    LoginForm.style.transform ="translateX(450px)";
    Indicator.style.transform ="translateX(-65px)";
}

function login() {
    RegForm.style.transform ="translateX(0px)";
    LoginForm.style.transform ="translateX(0px)";
    Indicator.style.transform ="translateX(65px)";
}



//This value may contain only letters, numbers and @/./+/-/_ characters.
let username = document.getElementById("username");
let password = document.getElementById("pass");
let confirmPass = document.getElementById("confirm-pass");
let errMessages = document.querySelectorAll(".error-msg");
let validChars = [
'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l',
'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'z',
'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L',
'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'Z',
'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '@', '.', '+', '-', '_'
];

//check register form before send data
RegForm.onsubmit = (e) => {
    //check username validation
    for(let i = 0; i < username.value.length; i++) {
        if(!validChars.find(c => c === username.value[i])) {
            e.preventDefault();
            errMessages[0].classList.add("active");
            break;
        }
    }
    
    //check password validation
    if(password.value.length < 8) {
        e.preventDefault();
        errMessages[1].classList.add("active");
    }
    
    //check confirm password
    if(confirmPass.value !== password.value) {
        e.preventDefault();
        errMessages[2].classList.add("active");
    }
}