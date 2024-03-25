<?php
    $request=$_SERVER['REQUEST_URI'];//ulozim URL
    //echo $request;

    //redirect
    switch ($request) {
        case '' :
            require __DIR__ . '/app/pages/dashboard.php';
            break;
        case '/' :
            require __DIR__ . '/app/pages/dashboard.php';
            break;
        case '/login' :
            require __DIR__ . '/app/pages/login.php';
            break;
        case '/admin' :
            require __DIR__ . '/app/pages/admin.php';
            break;
        default:
            http_response_code(404);//aby mě vyhledávače neindexovali neexistujici
            require __DIR__ . '/app/pages/404.php';
            break;
    }
    
?>