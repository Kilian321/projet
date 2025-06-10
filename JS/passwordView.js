const passwordView = document.querySelector("#passwordView");
const passwordHide = document.querySelector("#passwordHide");
const passwordinput = document.querySelector(".passwordInput");
const passwordinput2 = document.querySelector(".passwordInput2");
const passwordImg = document.querySelector(".img-2");
const passwordImg2 = document.querySelector(".img-3");


passwordView?.addEventListener('click',function (){
    if(passwordinput.type ==="text"){
        passwordinput.type="password";
        passwordImg.src ="../PICTURE/hide.png";
    } else {
        passwordinput.type="text";
        passwordImg.src ="../PICTURE/view.png";
    }
})

passwordHide?.addEventListener('click',function (){
    if(passwordinput2.type ==="text"){
        passwordinput2.type="password";
        passwordImg2.src ="../PICTURE/hide.png";
    } else {
        passwordinput2.type="text";
        passwordImg2.src ="../PICTURE/view.png";
    }
})