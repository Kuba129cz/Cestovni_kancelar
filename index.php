<?php
    $request=$_SERVER['REQUEST_URI'];//ulozim URL
    //echo $request;

    //redirect
    switch ($request) {
        case '' :
            require __DIR__ . '/app/page/dashboard.php';
            break;
        case '/' :
            require __DIR__ . '/app/page/dashboard.php';
            break;
        case '/login' :
            require __DIR__ . '/app/page/login.php';
            break;
        default:
            http_response_code(404);//aby mě vyhledávače neindexovali neexistujici
            require __DIR__ . '/app/page/404.php';
            break;
    }
    
?>
