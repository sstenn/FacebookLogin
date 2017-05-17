<?php
    
    session_start();

    $controller = isset($_GET['c'])? $_GET['c'] : 'page';
    $action     = isset($_GET['a'])? $_GET['a'] : 'auth';
    
    if(isset($_GET['code'])){
        
        $client_id      = '1334158273365558';
        $client_secret  = '42d9efd151fccba29a65c5c8ac76832c'; 
                
        $access_token   = file_get_contents('https://graph.facebook.com/v2.9/oauth/access_token?client_id='.$client_id.'&redirect_uri=http://examen.com/&client_secret='.$client_secret.'&code='.$_GET['code']);
        $json           = json_decode($access_token,true);
               
        $inspect        = file_get_contents('https://graph.facebook.com/debug_token?input_token='.$json['access_token'].'&access_token='.$client_id.'|'.$client_secret);
        $result         = json_decode($inspect, true);
        
        if($result['data']['is_valid']){
            $_SESSION['loggedIn'] = true;

            $user = file_get_contents('https://graph.facebook.com/v2.9/me?fields=id,name&access_token='.$json['access_token']);

            $_SESSION['user'] = json_decode($user, TRUE);

            header('Location: http://examen.com?c=page&a=app');
        }else{
            unset($_SESSION['loggedIn']);
            header('Location: http://examen.com?c=page&a=auth');
        }
    }

    $controllerName = 'controller/' . $controller . 'Controller' . '.php';
    
    if(file_exists($controllerName)){
        require_once ($controllerName);

        $controllerClassName = $controller . 'Controller';

        $controllerClass = new $controllerClassName();

        $output = $controllerClass->{$action}();

        echo $output;

    }else{
    }
