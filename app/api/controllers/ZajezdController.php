<?php
require_once __DIR__.'/../config/database.php';

class ZajezdController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }

    public function getData()
    {
       $SQL="SELECT * FROM Zajezd";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getData_join()
    {
        $SQL="SELECT Zajezd.*,Adresa.*,Strava.typ FROM Zajezd
         INNER JOIN Adresa ON Zajezd.fk_Adresa=Adresa.id_Adresa 
         INNER JOIN Strava ON Zajezd.fk_Strava=Strava.id_Strava ORDER BY datum_prijezdu DESC";
        $stmt=$this->conn->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItems_where($where)
    {
        $SQL="SELECT Zajezd.*,Adresa.*,Strava.typ FROM Zajezd
        INNER JOIN Adresa ON Zajezd.fk_Adresa=Adresa.id_Adresa 
        INNER JOIN Strava ON Zajezd.fk_Strava=Strava.id_Strava";
        $SQL=$SQL." WHERE ".$where." ORDER BY time_stamp DESC";
        $stmt=$this->conn->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>