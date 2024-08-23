<?php

    namespace App\Controllers;

    use SV\Controller\Action;
    use SV\Model\Container;

    class IndexController extends Action{

        public function index(){
            $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';

            $this->render('index');
        }

        public function inscreverse(){
            $this->view->usuario = array(
                'nome' => '',
                'email' => '',
                'senha' => ''

            );

            $this->view->erroCadastro = false;

            $this->render('inscreverse');
        }

        public function registrar(){
            
            $usuario = Container::getModel('Usuario');

            $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_SPECIAL_CHARS);

            $usuario->__set('nome', $nome);
            $usuario->__set('email', $email);
            $usuario->__set('senha', md5($senha));

            if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0){
                    $usuario->salvar();

                    $this->render('cadastro');
            } else {
                $this->view->usuario = array(
                    'nome' => $nome,
                    'email' => $email,
                    'senha' => $senha

                );

                $this->view->erroCadastro = true;

                $this->render('inscreverse');
            }

        }

    }

?>