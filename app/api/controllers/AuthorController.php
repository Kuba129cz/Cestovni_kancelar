<?php
require_once __DIR__.'/../config/database.php';

class AuthorController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }

    public function getAuthors()
    {
       $SQL="SELECT * FROM author ORDER BY id DESC";
       $stmt=$this->conn->prepare($SQL);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>