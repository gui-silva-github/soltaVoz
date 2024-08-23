<?php

    namespace App;

    use SV\init\Bootstrap;

    class Route extends Bootstrap{

        protected function initRoutes()
        {
            
            $routes['home'] = array(
                'route' => '/solta_voz/',
                'controller' => 'indexController',
                'action' => 'index',
            );
            $routes['inscreverse'] = array(
                'route' => '/solta_voz/inscreverse',
                'controller' => 'indexController',
                'action' => 'inscreverse',
            );
            $routes['registrar'] = array(
                'route' => '/solta_voz/registrar',
                'controller' => 'indexController',
                'action' => 'registrar'
            );
            $routes['autenticar'] = array(
                'route' => '/solta_voz/autenticar',
                'controller' => 'AuthController',
                'action' => 'autenticar'
            );
            $routes['timeline'] = array(
                'route' => '/solta_voz/timeline',
                'controller' => 'AppController',
                'action' => 'timeline'
            );
            $routes['sair'] = array(
                'route' => '/solta_voz/sair',
                'controller' => 'AuthController',
                'action' => 'sair' 
            );
            $routes['tweet'] = array(
                'route' => '/solta_voz/tweet',
                'controller' => 'AppController',
                'action' => 'tweet'
            );
            $routes['quem_seguir'] = array(
                'route' => '/solta_voz/quem_seguir',
                'controller' => 'AppController',
                'action' => 'quemSeguir'
            );
            $routes['acao'] = array(
                'route' => '/solta_voz/acao',
                'controller' => 'AppController',
                'action' => 'acao'
            );

            $this->setRoutes($routes);
        }

    }

?>