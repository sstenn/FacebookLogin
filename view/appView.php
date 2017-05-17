<?php

    class appView
    {
        function __construct()
        {
            if($_SESSION['loggedIn']){
                return true;
            }else{
                return false;
            }
        }
        
        function render()
        {
            $print = '
                <div>
                    Welkom '.$_SESSION['user']['name'].', u bent ingelogd!
                    Uw Facebook id is ' . $_SESSION['user']['id'].'
                </div>

            ';

            return $print;    
        }
    }
