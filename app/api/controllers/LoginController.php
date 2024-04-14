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

    public function registerUser($nick,$pass) 
    {
        //ToDo telefon + mail
        if (empty($nick) || empty($pass))
        {return false;}

        $query = "INSERT INTO User (nick, password) 
        VALUES (:nick, :pass)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $nick=htmlspecialchars(strip_tags($nick));
        $pass==htmlspecialchars(strip_tags($pass));
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        $stmt->bindParam(":nick", $nick);
        $stmt->bindParam(":pass", $hashedPassword);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>