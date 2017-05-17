<?php

    class loginModal
    {
        function __construct()
        {
        }

        function login()
        {
            header('Location: https://www.facebook.com/v2.9/dialog/oauth?client_id=1334158273365558&redirect_uri=http://examen.com/');
        }
        
    }
