<?php
require_once __DIR__.'/../config/database.php';

class ObjednavkaController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }

    public function getData()
    {
       $SQL="SELECT * FROM Objednavka";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getData_where($where)
    {
       $SQL="SELECT * FROM Objednavka
       INNER JOIN Zajezd ON Objednavka.fk_Zajezd=Zajezd.id_Zajezd
       INNER JOIN Adresa ON Zajezd.fk_Adresa=Adresa.id_Adresa 
       INNER JOIN Strava ON Zajezd.fk_Strava=Strava.id_Strava
       INNER JOIN Zakaznik ON Objednavka.fk_Zakaznik=Zakaznik.id_Zakaznik";
       $SQL=$SQL." WHERE ".$where;
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>