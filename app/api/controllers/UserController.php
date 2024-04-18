<?php
require_once __DIR__.'/../config/database.php';

class UserController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }

    public function getData()
    {
       $SQL="SELECT * FROM User";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData_where($where)
    {
       $SQL="SELECT * FROM User where $where";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($nick, $password, $telefon, $email)
    {
        //check v login.registerUser()

        $query = "INSERT INTO User (nick, password, telefon, email) 
        VALUES (:nick, :password, :telefon, :email)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $nick=htmlspecialchars(strip_tags($nick));
        $password==htmlspecialchars(strip_tags($password));
        $telefon=htmlspecialchars(strip_tags($telefon));
        $email=htmlspecialchars(strip_tags($email));

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(":nick", $nick);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->bindParam(":telefon", $telefon);
        $stmt->bindParam(":email", $email);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>