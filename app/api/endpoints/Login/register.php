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
    $res=$controller->registerUser($data['nick'], $data['password'], $data['telefon'],$data['email'], $data['jmeno'], $data['prijmeni'], $data['datum_narozeni'],$data['fk_Adresa']);

    if ($res['success']) {
        echo json_encode($res);
    }
    else{
        http_response_code(400); // Bad request
        echo json_encode($res);
    }
}
else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
}

?>