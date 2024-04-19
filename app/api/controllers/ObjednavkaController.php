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
       $SQL="SELECT * ,(cena_osoba*pocet_osob)as cena_celkem FROM Objednavka
       INNER JOIN Zajezd ON Objednavka.fk_Zajezd=Zajezd.id_Zajezd
       INNER JOIN Adresa ON Zajezd.fk_Adresa=Adresa.id_Adresa 
       INNER JOIN Strava ON Zajezd.fk_Strava=Strava.id_Strava
       INNER JOIN Zakaznik ON Objednavka.fk_Zakaznik=Zakaznik.id_Zakaznik";
       $SQL=$SQL." WHERE ".$where;
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($pocet_osob,$fk_zajezd,$fk_zakaznik) 
    {
        if (empty($pocet_osob) || empty($fk_zajezd) || empty($fk_zakaznik))
        {return false;}

        $query = "INSERT INTO Objednavka (pocet_osob,fk_zajezd,fk_zakaznik) 
        VALUES (:pocet_osob,:fk_zajezd,:fk_zakaznik)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $pocet_osob==htmlspecialchars(strip_tags($pocet_osob));
        //$datum_vytvoren=htmlspecialchars(strip_tags($datum_vytvoren));
        $fk_zajezd=htmlspecialchars(strip_tags($fk_zajezd));
        $fk_zakaznik=htmlspecialchars(strip_tags($fk_zakaznik));

        $stmt->bindParam(":pocet_osob", $pocet_osob);
        $stmt->bindParam(":fk_zajezd", $fk_zajezd);
        $stmt->bindParam(":fk_zakaznik", $fk_zakaznik);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>