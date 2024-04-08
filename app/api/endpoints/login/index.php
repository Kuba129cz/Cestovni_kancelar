<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../../controllers/LoginController.php';


$method=$_SERVER['REQUEST_METHOD'];
$controller=new LoginController();

if($method=='POST')
{
    $data = json_decode(file_get_contents("php://input"), true);
    $nick=$data['username']??'';
    $pass=$data['password']??'';

    $result=$controller->login($nick,$pass);

    if($result['success'])
    {
        session_start();
        $_SESSION['username']=$result['username'];
        echo json_encode($result);
    }
    else
    {
        http_response_code(401); //unauthorized
        echo json_encode($result);
    }
}
else {
    http_response_code(405); // Method not allowed
    echo json_encode(['message' => 'Method not allowed.']);
}

?>