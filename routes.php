<?php
require_once __DIR__ . "/app/controllers/LaborController.php";
/* require_once __DIR__ . "/app/controllers/LoteController.php";
require_once __DIR__ . "/app/controllers/EmpleadoController.php";
require_once __DIR__ . "/app/controllers/RegistroLaborController.php"; */

// Obtener la ruta de la URL
$request = $_SERVER["REQUEST_URI"];
$basePath = "/"; // Ajusta según tu configuración en XAMPP

// Definir rutas
$routes = [
    "/" => function () { echo "<h2>Bienvenido a la aplicación de registro de labores</h2>"; },
    "/labores" => function () { (new LaborController())->index(); },
    // "/lotes" => function () { (new LoteController())->index(); },
    // "/empleados" => function () { (new EmpleadoController())->index(); },
    // "/registros" => function () { (new RegistroLaborController())->index(); },
    "/labores/create" => function () { require __DIR__ . "/app/views/labores/create.php"; },
    // "/lotes/create" => function () { require __DIR__ . "/app/views/lotes/create.php"; },
    // "/empleados/create" => function () { require __DIR__ . "/app/views/empleados/create.php"; },
    // "/registros/create" => function () { require __DIR__ . "/app/views/registros/create.php"; },
];

if (array_key_exists($request, $routes)) {
    $routes[$request]();
} else {
    http_response_code(404);
    echo "<h2>Página no encontrada</h2>";
}
?>
