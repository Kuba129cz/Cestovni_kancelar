<?php
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/UserController.php';
require_once __DIR__.'/ZakaznikController.php';

class LoginController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }


    public function loginUser($nick,$pass)
    {
        //if ($stmt = $this->conn->prepare("SELECT * FROM user WHERE nick = :nick")) { // Bind parameter using named placeholder
        $SQL="select * from User WHERE nick = '$nick'";
        if($stmt=$this->conn->prepare($SQL))
        {
            // $stmt->bindParam(":nick",$nick); // Bind the parameter correctly
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) > 0)
            {
                $user = $result[0];
                if (password_verify($pass, $user['password']))// password_verify checks if the plain text password 'admin' matches the hash stored in $hashed_password 
                { 
                    return ['success' => true, 'username' => $user['nick'],'rights' => $user['role']];
                }
            }
            $stmt->closeCursor();
            /*
            The closeCursor method is used to free up the connection to the server so that other SQL statements may be issued. After a call to execute, the database server retains the statement ID and any associated resources until the cursor is closed. This can result in the server running out of resources if a large number of statements are being executed.
            In general, you don't need to call closeCursor after each query. It's only necessary if you're looking to free up resources after a SELECT query, before you execute the next query.
            */

        }
        return ['success' => false];
    }

    public function registerUser($nick, $password, $telefon, $email,$jmeno, $prijmeni,$datum_narozeni, $fk_Adresa) 
    {
        if(empty($nick)){return ['success' => false, 'message' => 'prázdný nick'];}
        if(empty($password)){return ['success' => false, 'message' => 'prázdné heslo'];}
        if(empty($telefon)){return ['success' => false, 'message' => 'prázdný telefon'];}
        if(empty($email)){return ['success' => false, 'message' => 'prázdný email'];}

        if(empty($jmeno)){return ['success' => false, 'message' => 'prázdné jméno'];}
        if(empty($prijmeni)){return ['success' => false, 'message' => 'prázdné přijmení'];}
        if(empty($datum_narozeni)){return ['success' => false, 'message' => 'prázdné datum narození'];}
        if(empty($fk_Adresa)){return ['success' => false, 'message' => 'prázdná adresa'];}

        $user_ctrl=new UserController();
        $zakaznik_ctrl=new ZakaznikController();

        $fk_user=$user_ctrl->getData_where("nick='$nick'");
        if(!empty($fk_user)){return ['success' => false, 'message' => 'tento uživatel již existuje'];}

        $user_ok=$user_ctrl->createUser($nick, $password, $telefon, $email);
        if(!$user_ok){return ['success' => false, 'message' => 'nepovedlo se vytvořit uživatele'];}
        
        $fk_user=$user_ctrl->getData_where("nick='$nick'");
        if(!empty($fk_user)){return ['success' => false, 'message' => 'nečekaná chyba'];}

        $zakaznik_ok=$zakaznik_ctrl->createZakaznik($jmeno, $prijmeni,$datum_narozeni, $fk_Adresa, $fk_user);
        if(!$zakaznik_ok){return ['success' => false, 'message' => 'nepovedlo se vytvořit zákazníka'];}

        return ['success' => true, 'message' => 'registrace úspěšná'];
    }
}
?>