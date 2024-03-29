<?php
require_once __DIR__.'/../config/database.php';

class ZakaznikController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }

    public function getData()
    {
       $SQL="SELECT * FROM Zakaznik";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>