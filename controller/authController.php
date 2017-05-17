<?php

    //session_start(); 

    class authController
    {

        function login()
        {
            $modalName = 'modal/' . __FUNCTION__ . 'Modal' . '.php';

            require_once ($modalName);

            $modalClassName = __FUNCTION__ . 'Modal';

            $modalClass = new $modalClassName();

            $login = $modalClass->login();

        }        

    }
