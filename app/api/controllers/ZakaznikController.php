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
   
    public function getZakaznikByNick($nick)
    {
        $SQL="SELECT Zakaznik.*,User.* FROM Zakaznik
        INNER JOIN User ON Zakaznik.fk_user=User.id_User 
        WHERE User.nick='$nick'";
        $stmt=$this->conn->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function createZakaznik($jmeno, $prijmeni,$datum_narozeni, $fk_Adresa,$fk_user)
    {
        //check v login.registerUser()

        $query = "INSERT INTO Zakaznik (jmeno, prijmeni, datum_narozeni, fk_Adresa, fk_user) 
        VALUES (:jmeno, :prijmeni, :datum_narozeni, :fk_Adresa, :fk_user)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $jmeno=htmlspecialchars(strip_tags($jmeno));
        $prijmeni==htmlspecialchars(strip_tags($prijmeni));
        $datum_narozeni=htmlspecialchars(strip_tags($datum_narozeni));
        $fk_Adresa=htmlspecialchars(strip_tags($fk_Adresa));

        $stmt->bindParam(":jmeno", $jmeno);
        $stmt->bindParam(":prijmeni", $prijmeni);
        $stmt->bindParam(":datum_narozeni", $datum_narozeni);
        $stmt->bindParam(":fk_Adresa", $fk_Adresa);
        $stmt->bindParam(":fk_user", $fk_user);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>