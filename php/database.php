<?php
  //  $con = mysqli_connect("localhost","admin","rdlb#2022","callcentergenerico");


class Usuaruio {
  private $pdo;
  public $msgErro
  public $sql

  public function conectar ($nome, $host, $usuario, $senha)
  {
    global $pdo;
    try {
        $pdo = new PDO("mysql:dbname=".$nome. ";host=".$host,$usario,$senha);
    } catch (PDOException $e) {
      $msgErro = $e->getMessage();
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
      $sql->bindValue(":s",senha);
      $sql->execute();
      return true;
    }



  }
  public function acessar($email,$senha){

        $sql = $pdo->prepare("SELECT id_user from usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha)
        $sql->execute();


        if($sql->rowCount() > 0)
        {
          return true;
        }else{
          return false;
        }
  }
}
?>
