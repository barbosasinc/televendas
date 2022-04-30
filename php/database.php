<?php
  //  $con = mysqli_connect("localhost","admin","rdlb#2022","callcentergenerico");


class Usuaruio {
  private $pdo;
  public $msgErro;
  public $sql;

  public function conectar ($nome, $host, $usuario, $senha)
  {
    global $pdo;
    try {
        $pdo = new PDO("mysql:dbname=".$nome. ";host=".$host,$usuario,$senha);
        //$pdo = new PDO("mysql:host=localhost;dbname=callmix", 'admin','rld2022');

    } catch (PDOException $e) {

      $msgErro = $e->getMessage();
      echo $msgErro;
    }



  }
  public function cadastrar($nome, $senha, $email, $telefone) {
    global $pdo;

    $sql = $pdo->prepare("SELECT id_user from usuarios WHERE email = :e");
    $sql->bindValue(":e",$email);
    $sql->execute();

    if($sql->rowCount() > 0)
    {
      return false;
    }else{
      $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e,:s)");
      $sql->bindValue(":n",$nome);
      $sql->bindValue(":e",$email);
      $sql->bindValue(":t",$telefone);
      $sql->bindValue(":s",md5(senha));
      $sql->execute();
      return true;
    }



  }
  public function acessar($email,$senha){
    global $pdo;


        $sql = $pdo->prepare("SELECT id_user from usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        //$sql = $pdo->prepare("SELECT id_user from usuarios WHERE email = 'teste' AND senha = '123teste'");
        $sql->execute();



        if($sql->rowCount() > 0)
        {
          $dado = $sql->fetch();
          session_start();
          $_SESSION['id_user'] = $dado['id_usr'];

          return true;
        }else{

          return false;
        }
  }
  
}

class Perguntas{
  private $pdo;
  public $msgErro;
  public $sql;

  public function conectar ($nome, $host, $usuario, $senha)
  {
    global $pdo;
    try {
        $pdo = new PDO("mysql:dbname=".$nome. ";host=".$host,$usuario,$senha);
        //$pdo = new PDO("mysql:host=localhost;dbname=callmix", 'admin','rld2022');

    } catch (PDOException $e) {

      $msgErro = $e->getMessage();
      echo $msgErro;
    }



  }  

  public function pergunta($id){
    global $pdo;


        $sql = $pdo->prepare("SELECT Pergunta from perguntas WHERE id = :e");
        $sql->bindValue(":e",$id);
        
        //$sql = $pdo->prepare("SELECT id_user from usuarios WHERE email = 'teste' AND senha = '123teste'");
        $sql->execute();



        if($sql->rowCount() > 0)
        {
          
         echo json_encode ($row["Perguntas"]);
        }else{

          return "";
        }
  }
}
?>
