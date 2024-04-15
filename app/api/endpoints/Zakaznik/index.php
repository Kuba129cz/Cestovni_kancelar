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
else if ($method == 'POST') 
{
    $data = json_decode(file_get_contents("php://input"), true);
    if ($controller->create($data['nick'], $data['password'], $data['telefon'],$data['email'], $data['jmeno'], $data['prijmeni'], $data['datum_narozeni'],$data['fk_Adresa'])) {
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