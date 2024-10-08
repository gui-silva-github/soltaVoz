<?php

    namespace SV\Controller;

    abstract class Action{

        protected $view;

        public function __construct()
        {
            $this->view = new \stdClass();
        }

        public function render($view, $layout = 'layout'){
            $this->view->page = $view;

            if(file_exists("../App/Views/$layout.php")){
                require_once("../App/Views/$layout.php");
            } else {
                $this->content();
            }

        }

        protected function content(){

            $classeAtual = get_class($this);
            $classeAtual = str_replace('App\\Controllers\\', '', $classeAtual);
            $classeAtual = strtolower(str_replace('Controller', '', $classeAtual));

            require_once("../App/Views/$classeAtual/".$this->view->page.".php");

        }

    }

?>