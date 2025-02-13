<?php
require_once __DIR__ . "/../models/RegistroLabor.php";
require_once __DIR__ . "/../models/Labor.php";
require_once __DIR__ . "/../models/Lote.php";
require_once __DIR__ . "/../models/Empleado.php";

class RegistroLaborController {
    private $model;

    public function __construct() {
        $this->model = new RegistroLabor();
    }

    public function index() {
        $registros = $this->model->getAll();
        require __DIR__ . "/../views/registros/index.php";
    }

    public function create() {
        $laborModel = new Labor();
        $loteModel = new Lote();
        $empleadoModel = new Empleado();
        $labores = $laborModel->getAll();
        $lotes = $loteModel->getAll();
        $empleados = $empleadoModel->getAll();
        require __DIR__ . "/../views/registros/create.php";
    }

    public function store() {
        session_start(); 
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $labor_id = $_POST["labor_id"];
            $lote_id = $_POST["lote_id"];
            //$empleado_id = $_POST["empleado_id"];
            $empleado_nombre = $_POST["empleado_nombre"];
            $fecha = $_POST["fecha"];
            $cantidad = $_POST["cantidad"];
            $tarifa = $_POST["tarifa"];
    
         if ($this->model->create($labor_id, $lote_id, $empleado_nombre/* $empleado_id */, $fecha, $cantidad, $tarifa)) {
                $_SESSION["success"] = "Registro guardado correctamente.";
            } else {
                $_SESSION["error"] = "Error al registrar la labor.";
            }
    
            header("Location: /p-php/prueba-php/public/registros/create");
            exit();
        }
    }

    public function delete($id) {
        session_start();
        if ($this->model->delete($id)) {
            $_SESSION["success"] = "Registro eliminado correctamente.";
        } else {
            $_SESSION["error"] = "Error al eliminar el registro.";
        }
        header("Location: /p-php/prueba-php/public/registros");
        exit();
    }
    

    public function edit($id) {
        $registro = $this->model->getById($id);
        if (!$registro) {
            $_SESSION["error"] = "Registro no encontrado.";
            header("Location: /p-php/prueba-php/public/registros");
            exit();
        }
    
        $laborModel = new Labor();
        $loteModel = new Lote();
        $empleadoModel = new Empleado();
        $labores = $laborModel->getAll();
        $lotes = $loteModel->getAll();
        //$empleados = $empleadoModel->getAll();
    
        require __DIR__ . "/../views/registros/edit.php";
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $labor_id = $_POST["labor_id"];
            $lote_id = $_POST["lote_id"];
            //$empleado_id = $_POST["empleado_id"];
            $empleado_nombre = $_POST["empleado_nombre"];
            $fecha = $_POST["fecha"];
            $cantidad = $_POST["cantidad"];
            $tarifa = $_POST["tarifa"];
    
            if ($this->model->update($id, $labor_id, $lote_id, $empleado_nombre/*$empleado_id*/, $fecha, $cantidad, $tarifa)) {
                session_start();
                $_SESSION["success"] = "Registro actualizado correctamente.";
                header("Location: /p-php/prueba-php/public/registros");
                exit();
            } else {
                session_start();
                $_SESSION["error"] = "Hubo un problema al actualizar el registro.";
                header("Location: /p-php/prueba-php/public/registros/edit/$id");
                exit();
            }
        }
    }
    
    
    
    
}
?>
