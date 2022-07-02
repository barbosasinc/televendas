<?php
  require_once( 'database.php' );
  $clientes = new Cliente();
  $clientes->Conectar("callmix", "localhost","admin", "asd123");

  echo '<html lang="pt-BR"><head><!-- informações gerais--><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="icon" type="image/png" href="icons/favicon.png"/>
    <link rel="stylesheet" href="/css/style-cadastro.css" /><title>Cadastro</title></head><header><div>Cadastro de clientes</div>
    </header>';

  if ($_POST) {
    echo "<footer> <span>{$clientes->Salvar($_POST)}</span></footer>";
  }
  if ($_GET[id] || $_GET[novo] == 's') {
      if ($_GET[novo] == 's' ) {
      } else {
        echo $_GET[id];
         $consulta = $clientes->Consultar($_GET[id],1,"id");
      }

    echo    "
      <div class='box'>
        <div class='card'>
          <form method='post' name='action' action='http://localhost/php/cadclientes.php'>
            <fieldset>
              <input name='id' id='id' type='hidden' value={$consulta[0][0]}>
              <div class='inputBox'>
                <label for='nome' class='labelInput'>
                  Nome Completo:
                  <input type='text' name='nome' id='nome' class='inputUser' required value={$consulta[0][1]} >
                </label>
                <label for='email'class='labelInput'>
                  E-Mail:
                  <input type='text' name='email' id='email' class='inputUser'  required value={$consulta[0][3]}>
                </label>

                <label for='telefone'class='labelInput'>
                  Telefone:
                  <input type='tel' name='telefone' id='telefone' class='inputUser' required value={$consulta[0][2]} >
                </label>


              </div>
              <div class='Genero'>
                <label>Genero:<label>
                <input type='radio' id='feminino' name='genero' value='feminino'>
                <label for='feminino' >Feminino</label>
                <input type='radio' id='masculino' name='genero' value='masculino' >
                <label for='masculino' >Masculino</label>
                <input type='radio' id='outros' name='genero' value='outros' >
                <label for='outros' >Outros</label>
              </div>
              <div class='data_nascimento'>
                <label for='data_nascimento' class='data_nascimento'>Data de Nascimento</label> <br>
                <input type='date' id='data_nascimento' name='data_nascimento' class='data_nascimento' value={$consulta[0][8]} >
              </div>
              <div class='inputBox'>
                  <label for='cep'>
                    CEP:
                    <input type='text' name='cep' id='cep'  value={$consulta[0][9]} >
                  </label>
                  <label for='logradouro'>
                    Logradouro:
                    <input type='text' name='logradouro' id='logradouro'  value={$consulta[0][14]} >
                  </label>
                  <label for='numero'>
                    Número:
                    <input type='text' name='numero' id='numero' value={$consulta[0][10]} >
                  </label>
                  <label for='complemento'>
                    Complemento:
                    <input type='text' name='complemento' id='complemento'  value={$consulta[0][11]} >
                  </label>
                  <label for='bairro'>
                    Bairro:
                    <input type='text' name='bairro' id='bairro' value={$consulta[0][13]} >
                  </label>
                  <label for='cidade'>
                    Cidade:
                    <input type='text' name='cidade' id='cidade' required  value={$consulta[0][4]}>
                  </label>

                  <div class='estado'>
                    <label class='Estado' for='uf'>Estado :</label>
                    <select id='uf' class=estado>
                    <option value='AC'>Acre</option>
                    <option value='AL'>Alagoas</option>
                    <option value='AP'>Amapá</option>
                    <option value='AM'>Amazonas</option>
                    <option value='BA'>Bahia</option>
                    <option value='CE'>Ceará</option>
                    <option value='DF'>Distrito Federal</option>
                    <option value='ES'>Espírito Santo</option>
                    <option value='GO'>Goiás</option>
                    <option value='MA'>Maranhão</option>
                    <option value='MT'>Mato Grosso</option>
                    <option value='MS'>Mato Grosso do Sul</option>
                    <option value='MG'>Minas Gerais</option>
                    <option value='PA'>Pará</option>
                    <option value='PB'>Paraíba</option>
                    <option value='PR'>Paraná</option>
                    <option value='PE'>Pernambuco</option>
                    <option value='PI'>Piauí</option>
                    <option value='RJ'>Rio de Janeiro</option>
                    <option value='RN'>Rio Grande do Norte</option>
                    <option value='RS'>Rio Grande do Sul</option>
                    <option value='RO'>Rondônia</option>
                    <option value='RR'>Roraima</option>
                    <option value='SC'>Santa Catarina</option>
                    <option value='SP'>São Paulo</option>
                    <option value='SE'>Sergipe</option>
                    <option value='TO'>Tocantins</option>
                  </select>
                  </div>
            </div>
              <Button type='submit' value='Salvar'>Enviar</button>
            </fieldset>

            <script type='text/javascript' src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
            <script type='text/javascript'>$('#cep').focusout(function(){
                  $.ajax({
                      url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
                      dataType: 'json',
                      success: function(resposta){
                          $('#logradouro').val(resposta.logradouro);
                          $('#complemento').val(resposta.complemento);
                          $('#bairro').val(resposta.bairro);
                          $('#cidade').val(resposta.localidade);
                          $('#uf').val(resposta.uf);
                          $('#numero').focus();
                      }
                  });
              });
          </script>
          </form>
        </div>";
  } else {
    $consulta = $clientes->Consultar();
    echo "<body> <table>  <th>ID</th> <th>NOME</th><th>NUMERO</th><th>EMAIL</th><th>cidade</th>
    <th>feminino</th> <th>masculino</th><th>outros</th><th>data_nascimento</th><th>cep</th><th>numero</th>
    <th>complemento</th> <th>bairro</th><th>logradouro</th><th class=botoestb></th>";


    for ($i=0; $i < count($consulta); $i++) {
      echo "<tr>";
      for ($x=0; $x < 14 ; $x++) {
        echo "<td> <a href=cadclientes.php?id={$consulta[$i][0]}>{$consulta[$i][$x]}</a></td>";
      }
        echo "<td class=botoestb><a  href=cadclientes.php?id={$consulta[$i][0]} >Excluir</a></td></tr>";
      }
    echo "</table><a  class='button' href='cadclientes.php?novo=s'>Novo</a></body>";

  }


?>
