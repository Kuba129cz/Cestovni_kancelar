<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../../controllers/ItemController.php';


$method=$_SERVER['REQUEST_METHOD'];
$controller=new ItemController();

if($method=='GET')
{
    $items=$controller->getItems();
    echo json_encode($items);
}
else if ($method == 'POST') 
{
    $data = json_decode(file_get_contents("php://input"), true);
    if ($controller->createTicket($data['author_id'], $data['destination_id'], $data['description'])) {
        http_response_code(201); // Created
        echo json_encode(['message' => 'Ticket created successfully.']);
    } else {
        http_response_code(503); // Service unavailable
        echo json_encode(['message' => 'Unable to create ticket.']);
    }
}
else if ($method == 'DELETE') { // Added DELETE condition
    $data = json_decode(file_get_contents("php://input"), true);
    var_dump($data);
    if ($controller->removeTicket($data)) {
        http_response_code(200); // OK
        echo json_encode(['message' => 'Ticket removed successfully.']);
    } else {
        http_response_code(404); // Not found
        echo json_encode(['message' => 'Ticket not found.']);
    }
}
else 
{
    http_response_code(405); // Method not allowed
    echo json_encode(['message' => 'Method not allowed.']);
}

?>