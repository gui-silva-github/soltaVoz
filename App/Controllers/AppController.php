<?php

    namespace App\Controllers;

    use SV\Controller\Action;
    use SV\Model\Container;

    class AppController extends Action{

        public function timeline(){

            $this->validaAutenticacao();

                $usuario = Container::getModel('Usuario');
                $usuario->__set('id', $_SESSION['id']);

                $tweet = Container::getModel('Tweet');

                $tweet->__set('id_usuario', $_SESSION['id']);

                $total_registros_pagina = 10;
                $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                $deslocamento = ($pagina - 1) * $total_registros_pagina;

                $tweets = $tweet->getPorPagina($total_registros_pagina, $deslocamento);
                $this->view->tweets = $tweets;

                $total_tweets = $tweet->getTotalRegistros();
                $this->view->total_de_paginas = ceil($total_tweets['total']/$total_registros_pagina);
                $this->view->pagina_ativa = $pagina;

                $this->view->info_usuario = $usuario->getInfoUsuario();
                $this->view->total_tweets = $usuario->getTotalTweets();
                $this->view->total_seguindo = $usuario->getTotalSeguindo();
                $this->view->total_seguidores = $usuario->getTotalSeguidores();

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
                $usuario->__set('id', $_SESSION['id']);

                $usuarios = $usuario->getAll();

            }

            $this->view->usuarios = $usuarios;

            $usuario = Container::getModel('Usuario');
            $usuario->__set('id', $_SESSION['id']);

            $this->view->info_usuario = $usuario->getInfoUsuario();
            $this->view->total_tweets = $usuario->getTotalTweets();
            $this->view->total_seguindo = $usuario->getTotalSeguindo();
            $this->view->total_seguidores = $usuario->getTotalSeguidores();

            $this->render('quemSeguir');

        }

        public function acao(){

            $this->validaAutenticacao();

            $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
            $id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';
            
            $id_tweet = isset($_GET['id_tweet']) ? $_GET['id_tweet'] : '';

            $usuario = Container::getModel('Usuario');
            $usuario->__set('id', $_SESSION['id']);

            if($acao == 'seguir'){
                $usuario->seguirUsuario($id_usuario_seguindo);
            } else if($acao == 'deixar_de_seguir'){
                $usuario->deixarSeguirUsuario($id_usuario_seguindo);
            } else if($acao == 'remover'){
                $usuario->removerTweet($id_tweet);
            }

            $header = $acao == 'seguir' || $acao == 'deixar_de_seguir' ? "/quem_seguir" : "/timeline";

            header('Location: ' . $header);

        }

    }

?>