<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

//OBRIGA USUARIO A ESTA LOGADO
Login::requireLogout();

//MENSAGEM DE ALERTA
$alertaLogin = '';
$alertaCadastro = '';

if(isset($_POST['acao'])){

    switch($_POST['acao']){
        case 'logar':
            //BUSCAR USUARIO POR EMAIL
            $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);
            
            
            if(!$obUsuario instanceof Usuario || !password_verify($_POST['senha'], $obUsuario->senha)){
                $alertaLogin = 'E-mail ou senha invalido';
                break;
            }
            Login::login($obUsuario);

            break;

        case 'cadastrar':
            if(isset($_POST['nome'],$_POST['email'],$_POST['senha']))

                //BUSCAR USUARIO POR EMAIL
                $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);
                if($obUsuario instanceof Usuario){
                    $alertaCadastro = 'O e-mail digitado ja esta em uso';
                    break;
                }
                //NOVO USUARIO
                $obUsuario = new Usuario;
                $obUsuario->nome = $_POST['nome'];
                $obUsuario->email = $_POST['email'];
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $obUsuario->cadastrar();

                Login::login($obUsuario);
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario-login.php';
include __DIR__.'/includes/footer.php';
 