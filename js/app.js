var btnSignin = document.getElementsByClassName("btn btn-second")[0];
var btnSignup = document.getElementsByClassName("btn btn-second2")[0];
var usr
var senha
var db
var request =  window.indexedDB.open("mydb2", 2);
var body = document.querySelector("body");
var transaction
var objectStore
var requestGET

//fetch("http://localhost").then(function(response){
//  console.log(response)
//})

request.onerror = function(event) {
  console.log(event)
}

request.onsuccess = function(event) {
  console.log("sucess")
   db = request.result;
    transaction = db.transaction(["usuarios"]);
    objectStore = transaction.objectStore("usuarios");
    requestGET

}
function checkUser(usr,senha){



  objectStore.get(usr);
  requestGET.onerror = function(event) {
   //alert("Usuário não encontrado")// Tratar erro!
   console.log(event)
  };
  requestGET.onsuccess = function(event) {
   // Fazer algo com request.result!
   if ( requestGET.result.senha == senha) {
      requestGET.href = "http://localhost/root.html"
   }else{
     alert("usuário e senha não confere!")
   };
  };
  }




btnSignin.addEventListener("click", function () {
  usr = document.getElementById("usr").value;
  senha = document.getElementById("pass").value;
  //objectStore.get(usr);


   //body.className = "sign-in-js";
   if (usr && senha ) {
     checkUser(usr,senha)

   } else {
     alert("Favor preenhcer o usuário e a senha!" + usr + senha )
   }
});

btnSignup.addEventListener("click", function () {
    console.log("click btn sign up")
})
