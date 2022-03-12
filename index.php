<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CallMix</title>
    <link rel="icon" type="image/png" href="icons/favicon.png"/>
    <link rel="stylesheet" href="css/style-index.css">
    <link rel="stylesheet" href="css/slide.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="http://kit.fontawesome.com/ca14b9e588.js" crossorigin="anonymous"></script>




</head>
<body>

   <!--MENU-->
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">bem vindo!</h2>
            </div>
            <div class="second-column">
                <h2 class="title title-second">acesse com</h2>
                <p class="description description-second">Entre com suas credênciais:</p>
                <form method="post" action="">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="  Usuário" name="usr">
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="  Senha" name="pass">
                    </label>

                    <button class="btn btn-second" type="submit">login</button>

                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">olá, atendente!</h2>
                <p class="description description-primary">Se você é novo por aqui,não deixe</p>
                <p class="description description-primary"> de dar uma conferida em nosso "Guia Prático".</p>
                <button id="signup" class="btn btn-primary">tutorial</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Cadastre-se com</h2>

                <p class="description description-second">ou crie um usuário  e senha:</p>
                <form method="post" action="php/login.php">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="  Usuário">
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="  Email">
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="  Senha">
                    </label>

                    <button class="btn btn-second2">ok</button>
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>

    <?php
      require_once( 'php/database.php' );
      $usuario = new Usuaruio();
      $usuario->conectar();

          if ( $usuario->acessar($_POST['usr'], $_POST['pass'])  )
          {
            header('Location: root.html');
            //exit;
          }else {
              //header('Location: ../index.html');
              echo "Usuário e senha inválido";
              //exit;

          }



    ?>

    <!--script src="js/app.js"></script-->
    <!--script src="js/database.js"></script-->

</body>
</html>
