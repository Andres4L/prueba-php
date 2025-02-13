<?php
require_once __DIR__ . "/../models/Lote.php";

class LoteController {
    private $model;

    public function __construct() {
        $this->model = new Lote();
    }

    public function index() {
        $lotes = $this->model->getAll();
        require __DIR__ . "/../views/lotes/index.php";
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST["nombre"];
            if ($this->model->create($nombre)) {
                header("Location: /lotes");
                exit();
            } else {
                echo "Error al agregar el lote.";
            }
        }
    }
}
?>
