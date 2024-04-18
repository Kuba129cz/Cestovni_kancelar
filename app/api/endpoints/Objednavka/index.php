<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../../controllers/ObjednavkaController.php';


$method=$_SERVER['REQUEST_METHOD'];
$controller=new ObjednavkaController();

if($method=='GET')
{
    $items=$controller->getData();
    echo json_encode($items);
}
else if ($method == 'POST') 
{
    $data = json_decode(file_get_contents("php://input"), true);
    if(empty($data['pocet_osob']))
    {
        http_response_code(400); // Bad Request
        echo json_encode(['message' => 'empty pocet_osob']);
    }
    else if ($controller->create($data['pocet_osob'], $data['fk_zajezd'], $data['fk_zakaznik'])) {
        http_response_code(201); // Created
        echo json_encode(['message' => 'Ticket created successfully.']);
    } else {
        http_response_code(503); // Service unavailable
        echo json_encode(['message' => 'Unable to create ticket.']);
    }
}
else {
    http_response_code(405); // Method not allowed
    echo json_encode(['message' => 'Method not allowed.']);
}

?>