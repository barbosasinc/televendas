var btnSignin = document.getElementById("logBtn");
var btnSignup = document.getElementsByClassName("btn btn-second2")[0];
var usr;
var senha;
var emp_name = document.getElementById("emp_name").value;
var empresas = [{name:"callmix", banco:"callmix", usuario:"admin", senha:"rld2022" },{name:"teste",banco:"callmix", usuario:"root", senha:"FczXfDoUmVmMj2" }];
var data = new FormData();


const logIn = function () {
  usr = document.getElementById("usr").value;
  senha = document.getElementById("pass").value;
  emp_name = document.getElementById("emp_name").value;
  let emp = empresas.filter(function(e) {return e.name == emp_name})
  //objectStore.get(usr);


   //body.className = "sign-in-js";
   if (usr && senha ) {
     data.append("usr",usr);
     data.append("pass",senha);
     data.append("emp_name",emp[0].banco);
     data.append("emp_user",emp[0].usuario);
     data.append("emp_pass",emp[0].senha);


      fetch("http://localhost/php/login.php", {method:"POST", body:data} ).then(function(e) {
        if (e.ok){
          window.location.href = '../root.html';
        }
        else {
          alert("usuario e senha invalidos");
          window.location.href = 'index.php';

        }
      }

      );
    //sleep(10)
   } else {
     alert("Favor preenhcer o usuário e a senha!" + usr + senha )
   }
};
btnSignin.addEventListener("click", logIn )

btnSignup.addEventListener("click", function () {
    console.log("click btn sign up")
})
