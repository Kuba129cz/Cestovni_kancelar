<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../../controllers/ZakaznikController.php';


$method=$_SERVER['REQUEST_METHOD'];
$controller=new ZakaznikController();

if($method=='GET')
{
    $items=$controller->getData();
    echo json_encode($items);
}
if ($method == 'POST') 
{
    $data = json_decode(file_get_contents("php://input"), true);

    if(empty($data['nick']))
    {
        http_response_code(400); // Bad Request
        echo json_encode(['message' => 'empty nick']);
    }
    else
    {
        $ret=$controller->getZakaznikByNick($data['nick']);
        echo json_encode($ret);
    }
}
else {
    http_response_code(405); // Method not allowed
    echo json_encode(['message' => 'Method not allowed.']);
}

?>