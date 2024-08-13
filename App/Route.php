<?php

    namespace App;

    use SV\init\Bootstrap;

    class Route extends Bootstrap{

        protected function initRoutes()
        {
            
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index',
            );
            $routes['about'] = array(
                'route' => '/inscreverse',
                'controller' => 'indexController',
                'action' => 'inscreverse',
            );

            $this->setRoutes($routes);
        }

    }

?>