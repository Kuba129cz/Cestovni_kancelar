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
    if ($controller->registerUser($data['username'], $data['password'])) {
        http_response_code(201); // Created
        echo json_encode(['message' => 'user created successfully.']);
    } else {
        http_response_code(503); // Service unavailable
        echo json_encode(['message' => 'Unable to create ticket.']);
    }
}
else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
}

?>