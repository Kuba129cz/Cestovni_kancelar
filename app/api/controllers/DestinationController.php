<?php
require_once __DIR__.'/../config/database.local.php';

class DestinationController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }

    public function getDestinations()
    {
       $SQL="SELECT * FROM destination ORDER BY dest_name DESC";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>