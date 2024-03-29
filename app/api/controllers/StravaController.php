<?php
require_once __DIR__.'/../config/database.remote.php';

class StravaController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }

    public function getStrava()
    {
       $SQL="SELECT * FROM Strava";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>