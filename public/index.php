<?php
require_once __DIR__ . "/../app/controllers/LaborController.php";
require_once __DIR__ . "/../app/controllers/LoteController.php";
require_once __DIR__ . "/../app/controllers/EmpleadoController.php";
require_once __DIR__ . "/../app/controllers/RegistroLaborController.php";


$basePath = "/p-php/prueba-php/public";
$requestUri = $_SERVER["REQUEST_URI"];

// Asegurarse de que la URL comienza con el basePath antes de reemplazarlo
if (strpos($requestUri, $basePath) === 0) {
    $request = substr($requestUri, strlen($basePath));
} else {
    $request = $requestUri; // En caso de acceso directo sin basePath
}

// Quitar parámetros de la URL (evita errores con query strings)
$request = strtok($request, '?');

// Si la URL está vacía, asignamos "/"
if ($request == "") {
    $request = "/";
}



switch ($request) {

    case (preg_match("#^/registros/delete/(\d+)$#", $request, $matches) ? true : false):
        $controller = new RegistroLaborController();
        $controller->delete($matches[1]);
        break;
    

    case (preg_match("#^/registros/edit/(\d+)$#", $request, $matches) ? true : false):
        $controller = new RegistroLaborController();
        $controller->edit($matches[1]); 
        break;
    
    case (preg_match("#^/registros/update/(\d+)$#", $request, $matches) ? true : false):
        $controller = new RegistroLaborController();
        $controller->update($matches[1]); 
        break;
    
    case "/":
        $controller = new RegistroLaborController();
        $controller->index();
        break;
    
    case "/labores":
        $controller = new LaborController();
        $controller->index();
        break;

    case "/lotes":
        $controller = new LoteController();
        $controller->index();
        break;

    case "/empleados":
        $controller = new EmpleadoController();
        $controller->index();
        break;

    case "/registros":
        $controller = new RegistroLaborController();
        $controller->index();
        break;

    case "/labores/store":
        $controller = new LaborController();
        $controller->store();
        break;

    case "/lotes/store":
        $controller = new LoteController();
        $controller->store();
        break;

    case "/empleados/store":
        $controller = new EmpleadoController();
        $controller->store();
        break;

    case "/registros/store":
        $controller = new RegistroLaborController();
        $controller->store();
        break;
        
    case "/labores/create":
        require __DIR__ . "/../app/views/labores/create.php";
        break;

    case "/lotes/create":
        require __DIR__ . "/../app/views/lotes/create.php";
        break;

  case "/empleados/create":
        require __DIR__ . "/../app/views/empleados/create.php";
        break;

  case "/registros/create":
        $controller = new RegistroLaborController();
        $controller->create();
        break;
    

    default:
        http_response_code(404);
        echo "<h2>Página no encontrada</h2>";
        break;
}
?>

