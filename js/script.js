var db = openDatabase('mydb', '1.0', 'Test DB', 2 * 1024 * 1024); 

document.querySelector("button").onclick = () =>{
db.transaction(function (tx, result) { 
   var usr = document.getElementById("usuario").value; 
   var senha = document.getElementById("senha").value; 
   tx.executeSql('CREATE TABLE IF NOT EXISTS logins (id unique, senha)'); 
   tx.executeSql('INSERT INTO logins (id, senha) VALUES (? ,?)',
                    [usr,senha], 
                    function(tx,result){console.log(result)},
                    function(tx,result){console.log(result)} ); 
   
   
   console.log(result)
})

}