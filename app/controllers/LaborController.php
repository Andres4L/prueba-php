<?php
require_once __DIR__ . "/../models/Labor.php";

class LaborController {
    private $model;

    public function __construct() {
        $this->model = new Labor();
    }

    public function index() {
        $labores = $this->model->getAll();
        require __DIR__ . "/../views/labores/index.php";
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST["nombre"];
            if ($this->model->create($nombre)) {
                header("Location: /labores");
                exit();
            } else {
                echo "Error al agregar la labor.";
            }
        }
    }
}
?>
