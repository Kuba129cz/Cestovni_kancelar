<?php
require_once __DIR__.'/../config/database.php';

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
        $SQL="SELECT * FROM zajezd ORDER BY time_stamp DESC";
        $stmt=$this->conn->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getItems_join()
    {
        $SQL="SELECT zajezd.*,destination.dest_name FROM zajezd INNER JOIN destination ON zajezd.destination_id=destination.dest_id ORDER BY time_stamp DESC";
        $stmt=$this->conn->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItems_where($where)
    {
        $SQL="SELECT zajezd.*,destination.dest_name FROM zajezd INNER JOIN destination ON zajezd.destination_id=destination.dest_id";
        $SQL=$SQL." WHERE ".$where." ORDER BY time_stamp DESC";
        $stmt=$this->conn->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTicket($author_id, $destination_id, $description) {

        if (empty($author_id) || empty($destination_id) || empty($description)) {
            return false;
        }

        $query = "INSERT INTO zajezd (author_id, destination_id, description) VALUES (:author_id, :destination_id, :description)";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $author_id=htmlspecialchars(strip_tags($author_id));
        $destination_id=htmlspecialchars(strip_tags($destination_id));
        $description=htmlspecialchars(strip_tags($description));

        $stmt->bindParam(":author_id", $author_id);
        $stmt->bindParam(":destination_id", $destination_id);
        $stmt->bindParam(":description", $description);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function removeTicket($itemId) {
        $query = "DELETE FROM zajezd WHERE id = :itemId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":itemId", $itemId);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

}
?>