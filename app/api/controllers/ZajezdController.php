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


    public function create($datum_prijezdu, $datum_odjezdu, $cena_osoba, $popis, $fk_strava, $fk_Adresa) 
    {
        if (empty($datum_prijezdu) || empty($datum_odjezdu) || empty($cena_osoba) || empty($popis) || empty($fk_strava) || empty($fk_Adresa))
        {return false;}

        $query = "INSERT INTO Zajezd (datum_prijezdu, datum_odjezdu, cena_osoba, popis, fk_strava, fk_Adresa) 
        VALUES (:datum_prijezdu, :datum_odjezdu, :cena_osoba, :popis, :fk_strava, :fk_Adresa)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $datum_prijezdu=htmlspecialchars(strip_tags($datum_prijezdu));
        $datum_odjezdu==htmlspecialchars(strip_tags($datum_odjezdu));
        $cena_osoba=htmlspecialchars(strip_tags($cena_osoba));
        $popis=htmlspecialchars(strip_tags($popis));
        $fk_strava=htmlspecialchars(strip_tags($fk_strava));
        $fk_Adresa=htmlspecialchars(strip_tags($fk_Adresa));

        $stmt->bindParam(":datum_prijezdu", $datum_prijezdu);
        $stmt->bindParam(":datum_odjezdu", $datum_odjezdu);
        $stmt->bindParam(":cena_osoba", $cena_osoba);
        $stmt->bindParam(":popis", $popis);
        $stmt->bindParam(":fk_strava", $fk_strava);
        $stmt->bindParam(":fk_Adresa", $fk_Adresa);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>