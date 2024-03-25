<?php
require_once __DIR__.'../config/database.php';

class ItemController
{
    private $conn;

    public function __construct()
    {
        $database=new Database();
        $this->conn=$database->getConnection();
    }

    public function getItems()
    {
       $SQL="SELECT * FROM zajezd ORDER BY id DESC";
    }
}
?>