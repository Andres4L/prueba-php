<?php

require_once __DIR__ . "/../../config/dataBase.php";


class Labor
{
    private $conn;
    private $table = "labores";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nombre){
        $query = "INSERT INTO " . $this->table . "(nombre) VALUES (:nombre)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        return $stmt->execute();
    }
}