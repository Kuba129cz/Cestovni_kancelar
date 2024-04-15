<?php
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/UserController.php';


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

    private function createUser($nick, $password, $telefon, $email)
    {
        $query = "INSERT INTO User (nick, password, telefon, email) 
        VALUES (:nick, :password, :telefon, :email)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $nick=htmlspecialchars(strip_tags($nick));
        $password==htmlspecialchars(strip_tags($password));
        $telefon=htmlspecialchars(strip_tags($telefon));
        $email=htmlspecialchars(strip_tags($email));

        $stmt->bindParam(":nick", $nick);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":telefon", $telefon);
        $stmt->bindParam(":email", $email);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    private function createZakaznik($jmeno, $prijmeni,$datum_narozeni, $fk_Adresa,$fk_user)
    {
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

    public function create($nick, $password, $telefon, $email,$jmeno, $prijmeni,$datum_narozeni, $fk_Adresa) 
    {
        if (empty($nick) || empty($password) || empty($telefon) || empty($email))
        {return false;}
        if(empty($jmeno) || empty($prijmeni)|| empty($datum_narozeni)|| empty($fk_Adresa))
        {return false;}
        $user_ctrl=new UserController();

        $fk_user=$user_ctrl->getData_where("nick='$nick'");
        if(!empty($fk_user))
        {return false;}
        /*$user_ok=createUser($nick, $password, $telefon, $email);
        if(!$user_ok){return false;}
*/
        $fk_user=$user_ctrl->getData_where("nick='$nick'");
        if(!empty($fk_user))
        {return false;}

        /*$zakaznik_ok=createZakaznik($jmeno, $prijmeni,$datum_narozeni, $fk_Adresa, $fk_user);
        if(!$zakaznik_ok){return false;}*/

        return true;
    }
}
?>