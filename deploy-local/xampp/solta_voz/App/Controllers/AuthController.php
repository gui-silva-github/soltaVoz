<?php

    namespace App\Controllers;

    use SV\Controller\Action;
    use SV\Model\Container;

    class AuthController extends Action{

        public function autenticar(){

            $usuario = Container::getModel('Usuario');

            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

            $usuario->__set('email', $email);
            $usuario->__set('senha', md5($senha));   

            $usuario->autenticar();

            if($usuario->__get('id') != '' && $usuario->__get('nome')){
                
                session_start();

                $_SESSION['id'] = $usuario->__get('id');
                $_SESSION['nome'] = $usuario->__get('nome');

                header('Location: /solta_voz/timeline');

            } else {
                header('Location: /solta_voz/?login=erro');
            }

        }

        public function sair(){
            session_start();
            session_destroy();  
            header('Location: /solta_voz/');
        }

    }

?>