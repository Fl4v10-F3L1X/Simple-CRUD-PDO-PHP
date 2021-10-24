<?php
  
  use \App\Session\Login;

  //DADOS DE USUARIO LOGADO
  $usuarioLogado = Login::getUsuarioLogado();

  //DETALHES DO USUARIO
  $usuario = $usuarioLogado ? 
              $usuarioLogado['nome'].'<a href="logout.php" class="text-light font-weight-bold ml-2">Sair</a>':
              'Visitante <a href="login.php" class="text-light font-weight-bold ml-2">Entrar</a>';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>CRUD VAGAS</title>
  </head>
  <body class="bg-dark text-light">

    <div class ="container">
        <div class="jumbotron bg-danger">
            <h1>CRUD PHP</h1>
            <p>Exemplo de CRUD com PHP orientados a objectos</p>

            <hr class="border-light">

            <div class="d-flex justify-content-start">
              <?=$usuario?>
            </div>
          </div>

    
