<?php

    class pageController
    {
        function auth()
        {
            $viewName = 'view/' . __FUNCTION__ . 'View' . '.php';

            require_once ($viewName);

            $viewClassName = __FUNCTION__ . 'View';

            $viewClass = new $viewClassName();


            return $viewClass->render();

        }
        function app()
        {
            $viewName = 'view/' . __FUNCTION__ . 'View' . '.php';

            require_once ($viewName);

            $viewClassName = __FUNCTION__ . 'View';

            $viewClass = new $viewClassName();

            if($viewClass){
                return $viewClass->render();
            }else{
                header('Location: http://examen.com?c=page&a=auth');
            }
            
        }
    }
