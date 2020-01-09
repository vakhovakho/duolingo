<?php
    $routes = [
        'get' => [
            'home' => null, 
            'random' => null
        ],
        'post' => [
            'home' => null, 
            'forgot' => 'forgot'
        ]
    ];


    $file = 'home';
    $forbiddenRequest = false;
    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if($uriSegments[1] === '') {
        $uriSegments[1] = 'home';
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(array_key_exists($uriSegments[1], $routes['post'])) {
            if(!is_null($routes['post'][$uriSegments[1]])){
                require('../controllers/' . $routes['post'][$uriSegments[1]] . '.php'); exit;
            }
        } else {
            $forbiddenRequest = true;
        }
    } 
    
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(array_key_exists($uriSegments[1], $routes['get'])) {
            $file = $uriSegments[1];
        } else {
            $forbiddenRequest = true;
        }
    }

    if($forbiddenRequest) {
        http_response_code(404);
        // include('my_404.php'); // provide your own HTML for the error page
        exit();
    }
?>