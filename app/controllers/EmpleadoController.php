<?php
require_once __DIR__ . "/../models/Empleado.php";

class EmpleadoController {
    private $model;

    public function __construct() {
        $this->model = new Empleado();
    }

    public function index() {
        $empleados = $this->model->getAll();
        require __DIR__ . "/../views/empleados/index.php";
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST["nombre"];
            if ($this->model->create($nombre)) {
                header("Location: /empleados");
                exit();
            } else {
                echo "Error al agregar el empleado.";
            }
        }
    }
}
?>
