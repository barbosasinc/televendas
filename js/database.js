// In the following line, you should include the prefixes of implementations you want to test.
window.indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
// DON'T use "var indexedDB = ..." if you're not in a function.
// Moreover, you may need references to some window.IDB* objects:
window.IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.msIDBTransaction || {READ_WRITE: "readwrite"}; // This line should only be needed if it is needed to support the object's constants for older browsers
window.IDBKeyRange = window.IDBKeyRange || window.webkitIDBKeyRange || window.msID



  const usuarioData = [
    { usuario: "user", nome: "Supervisor", senha: 123, email: "usiario@teste.com" }
  ];


  addEventListener('fetch', function(event) {
    console.log("response");
    event.respondWith(
      new Response(usuarioData, {
        headers: { "Content-Type" : "text/plain" }
      })
    );
  });

if (!window.indexedDB) {
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
  })};

} else {
  var request = window.indexedDB.open("mydb2", 2);
  request.onerror = function(event) {
    console.log("error " + event.target.erroCode)
  // Do something with request.errorCode!
};
request.onsuccess = function(event) {
      console.log("success")

  request.onupgradeneeded = function(event) {
  // Save the IDBDatabase interface

      var db =  event.target.result;

  //  var db =  event.target.result;
    //console.log("success")
    // Create an objectStore to hold information about our customers. We're
    // going to use "ssn" as our key path because it's guaranteed to be
    // unique - or at least that's what I was told during the kickoff meeting.
    var objectStore = db.createObjectStore("usuarios", { keyPath: "usuario" });


    // Create an index to search customers by email. We want to ensure that
    // no two customers have the same email, so use a unique index.
    objectStore.createIndex("email", "email", { unique: true });

    objectStore.transaction.oncomplete = function(event) {
      // Store values in the newly created objectStore.
      var usuariosObjectStore = db.transaction("usuarios", "readwrite").objectStore("usuarios");
      usuariosData.forEach(function(usuario) {
        usuariosObjectStore.add(usuario);
      });


};
};
};
} 
