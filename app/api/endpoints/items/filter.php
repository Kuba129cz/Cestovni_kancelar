<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../../controllers/ItemController.php';


$method=$_SERVER['REQUEST_METHOD'];
$controller=new ItemController();

//u GET hrozí SQL injection
if ($method == 'POST') 
{
    $data = json_decode(file_get_contents("php://input"), true);
    $ret=$controller->getItems_where($data['where']);
    echo json_encode($ret);
}
else 
{
    http_response_code(405); // Method not allowed
    echo json_encode(['message' => 'Method not allowed.']);
}

?>