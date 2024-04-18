<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../../controllers/ZajezdController.php';


$method=$_SERVER['REQUEST_METHOD'];
$controller=new ZajezdController();

if($method=='GET')
{
    $items=$controller->getData_join();
    echo json_encode($items);
}
else if ($method == 'POST') 
{
    $data = json_decode(file_get_contents("php://input"), true);
    //newItem: { datum_prijezdu: '', datum_odjezdu: '',cena_osoba: 0, popis: '',fk_strava:'',fk_Adresa:''}
    $res=$controller->create($data['datum_prijezdu'], $data['datum_odjezdu'], $data['cena_osoba'], $data['popis'], $data['fk_strava'], $data['fk_Adresa']);

    if ($res['success']) {
        http_response_code(201); // Created
        echo json_encode($res);
    }
    else{
        http_response_code(400); // Bad request
        echo json_encode($res);
    }
}
else {
    http_response_code(405); // Method not allowed
    echo json_encode(['message' => 'Method not allowed.']);
}

?>