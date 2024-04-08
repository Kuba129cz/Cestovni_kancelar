<?php
require_once __DIR__.'/../config/database.php';

class LoginController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }


    public function login($nick,$pass)
    {
       $SQL="select * from User WHERE nick = :nick";
       if($stmt=$this->conn->prepare($SQL))
       {
         $stmt->bindParam(":nick",$nick);
         $stmt->execute();

         $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
         if(count($result)>0)
         {
            $user=$result[0];
            if(password_verify($pass,$user["password"]))
            {
                return['success'=>true, 'username'=>$user['username']];
            }
         }
         $stmt->closecursor();         
       }
       return['success'=>false];
    }
}
?>