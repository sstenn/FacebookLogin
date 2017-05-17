<?php

    class authView
    {
        function render()
        {
            $print = '
            <div class="container text-center">
                <div class="login">
                <form action="?c=auth&a=login" method="POST">
                    <input type="submit" class="btn btn-default form-control" value="Login!">
                </form>
            </div>

            ';

            return $print;    
        }
    }
