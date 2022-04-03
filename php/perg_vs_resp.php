<?php
    require_once( 'database.php' );
    $usuario = new Perguntas();
    $usuario->conectar($_POST['emp_name'], "localhost",$_POST['emp_user'],$_POST['emp_pass']);



        if ( $usuario->acessar($_POST['usr'], $_POST['pass'])  )
        {
          http_response_code(200);

        }else {
            //header('Location: ../index.html');
            http_response_code(404);
            //exit;

        }



  ?>
