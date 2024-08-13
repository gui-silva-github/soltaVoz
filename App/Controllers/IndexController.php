<?php

    namespace App\Controllers;

    use SV\Controller\Action;

    class IndexController extends Action{

        public function index(){
            $this->render('index');
        }

        public function inscreverse(){
            $this->render('inscreverse');
        }

    }

?>