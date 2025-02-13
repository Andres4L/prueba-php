<?php
require_once __DIR__ . "/../../config/dataBase.php";

class RegistroLabor {
    private $conn;
    private $table = "registros_labores";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll() {
        $query = "SELECT rl.id, l.nombre as labor, lo.nombre as lote,rl.empleado_nombre/*e.nombre as empleado*/, rl.fecha, rl.cantidad, rl.tarifa
          FROM " . $this->table . " rl
          JOIN labores l ON rl.labor_id = l.id
          JOIN lotes lo ON rl.lote_id = lo.id
          
          ORDER BY rl.id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //JOIN empleados e ON rl.empleado_id = e.id

    public function create($labor_id, $lote_id,$empleado_nombre/*$empleado_id*/, $fecha, $cantidad, $tarifa) {
        $query = "INSERT INTO " . $this->table . " (labor_id, lote_id, empleado_nombre, fecha, cantidad, tarifa) 
                  VALUES (:labor_id, :lote_id, :empleado_nombre, :fecha, :cantidad, :tarifa)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":labor_id", $labor_id);
        $stmt->bindParam(":lote_id", $lote_id);
        $stmt->bindParam(":empleado_nombre", $empleado_nombre);
        //$stmt->bindParam(":empleado_id", $empleado_id);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":cantidad", $cantidad);
        $stmt->bindParam(":tarifa", $tarifa);
        return $stmt->execute();
    }

    //:empleado_id

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    } 
    
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $labor_id, $lote_id, $empleado_nombre, $fecha, $cantidad, $tarifa) {
        $query = "UPDATE " . $this->table . " SET labor_id = :labor_id, lote_id = :lote_id, empleado_nombre = :empleado_nombre, fecha = :fecha, cantidad = :cantidad, tarifa = :tarifa WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":labor_id", $labor_id);
        $stmt->bindParam(":lote_id", $lote_id);
        //$stmt->bindParam(":empleado_id", $empleado_id);
        $stmt->bindParam(":empleado_nombre", $empleado_nombre);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":cantidad", $cantidad);
        $stmt->bindParam(":tarifa", $tarifa);
        return $stmt->execute();
    }
    //empleado_id = :empleado_id
}
?>
