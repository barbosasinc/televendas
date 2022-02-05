
var btnSignin = document.getElementsByClassName("btn btn-second")[0];
var btnSignup = document.getElementsByClassName("btn btn-second2")[0];

var body = document.querySelector("body");


btnSignin.addEventListener("click", function () {
   //body.className = "sign-in-js";
   console.log("click btn sign in")
});

btnSignup.addEventListener("click", function () {
    console.log("click btn sign up")
})
