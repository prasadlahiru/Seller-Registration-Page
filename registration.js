const form = document.querySelector('form'),
    emailField = form.querySelector(".email-field"),
    emailInput = emailField.querySelector(".email"),
    passField  = form.querySelector(".password-field"),
    passInput  = passField.querySelector(".password"),
    cpassField = form.querySelector(".cpassword-field"),
    cpassInput = cpassField.querySelector(".cpassword");

  
const x = document.querySelector(".check-ok");
const y = document.querySelector(".cpassword");

function matchPassword(){
    if(passInput.value !== cpassInput.value) //&& cpassInput.value!==""
    {
       
        return cpassField.classList.add("invalid");
         
    }  
    cpassField.classList.remove("invalid");   
}   
    cpassInput.addEventListener("keyup",matchPassword);

function checkPassword(){
    const passwordPattern =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    if(!passInput.value.match(passwordPattern)){
        return passField.classList.add("invalid");

    }
    passField.classList.remove("invalid");
}
    passInput.addEventListener("keyup",checkPassword);
function checkEmail(){
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if(!emailInput.value.match(emailPattern)){
            return emailField.classList.add("invalid");
        }
        emailField.classList.remove("invalid");
    }
    emailInput.addEventListener("keyup",checkEmail);

function storeName(){
    var name= document.getElementById('store-name').value;
    document.getElementById('storeName').innerHTML = "Your store url: hopee.lk/store/" + name;
}


const eyeIcon = document.querySelectorAll(".show-hide");

eyeIcon.forEach(eyeIcon=>{
    eyeIcon.addEventListener("click",()=>{
        const pInput=eyeIcon.parentElement.querySelector("input");
        //eyeIcon.classList.replace("bx-hide","bx-show");
        if(pInput.type === "password"){
            eyeIcon.classList.replace("bx-hide","bx-show");
            return pInput.type="text";
        }
        eyeIcon.classList.replace("bx-show","bx-hide");
        return pInput.type="password";
    })
})

  