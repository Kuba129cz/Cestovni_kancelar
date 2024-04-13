<?php
require_once __DIR__.'/../config/database.php';

class AdresaController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }

    public function getData()
    {
       $SQL="SELECT * FROM Adresa";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdresaZajezdByID($id)
    {
       $SQL="select * from Adresa JOIN Zajezd ON Adresa.id_Adresa = Zajezd.fk_Adresa JOIN Strava on Zajezd.fk_strava = Strava.id_strava WHERE Zajezd.id_zajezd = $id; ";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>