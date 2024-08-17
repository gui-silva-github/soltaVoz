<?php

    namespace App\Controllers;

    use SV\Controller\Action;
    use SV\Model\Container;

    class AppController extends Action{

        public function timeline(){

            $this->validaAutenticacao();

                $tweet = Container::getModel('Tweet');

                $tweet->__set('id_usuario', $_SESSION['id']);

                $tweets = $tweet->getAll();

                $this->view->tweets = $tweets;

                $this->render('timeline');

        }

        public function tweet(){

            $this->validaAutenticacao();
                
                $tweet = Container::getModel('Tweet');

                $valor = filter_input(INPUT_POST, 'tweet', FILTER_SANITIZE_SPECIAL_CHARS);

                $tweet->__set('tweet', $valor);
                $tweet->__set('id_usuario', $_SESSION['id']);

                $tweet->salvar();

                header('Location: /timeline');

        }

        public function validaAutenticacao(){

            session_start();

            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == ''){
                header('Location: /?login=erro');
            }

        }

        public function quemSeguir(){

            $this->validaAutenticacao();

            $pesquisa = filter_input(INPUT_GET, 'pesquisarPor', FILTER_SANITIZE_SPECIAL_CHARS);

            $pesquisarPor = isset($pesquisa) ? $pesquisa : '';  

            $usuarios = array();

            if($pesquisarPor != ''){
                
                $usuario = Container::getModel('Usuario');

                $usuario->__set('nome', $pesquisarPor);

                $usuarios = $usuario->getAll();

            }

            $this->view->usuarios = $usuarios;

            $this->render('quemSeguir');

        }

    }

?>