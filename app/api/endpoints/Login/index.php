<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../../controllers/LoginController.php';
require_once __DIR__ . '/../../controllers/ZakaznikController.php';


$method=$_SERVER['REQUEST_METHOD'];
$controller=new LoginController();

if($method=='POST')
{
    $data = json_decode(file_get_contents("php://input"), true);
    $nick=$data['username']??'';
    $pass=$data['password']??'';

    $loginResult=$controller->loginUser($nick,$pass);

    if ($loginResult['success']) {
        session_start(); // 1st session_start() call
        $_SESSION['username'] = $loginResult['username'];
        $_SESSION['rights'] = $loginResult['rights'];

        $zakaznik_ctrl=new ZakaznikController();
        $zakaznik=$zakaznik_ctrl->getZakaznikByNick($loginResult['username']);
        if(count($zakaznik)>0)
        {
            $_SESSION['zakaznik']=$zakaznik[0];
        }
        
        echo json_encode(['success' => true, 'message' => 'Login successful']);
    }
    else
    {
        http_response_code(401); // Unauthorized
        echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
    }
}
else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
}

?>