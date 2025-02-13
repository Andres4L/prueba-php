<?php
require_once __DIR__ . "/../app/controllers/LaborController.php";
require_once __DIR__ . "/../app/controllers/LoteController.php";
require_once __DIR__ . "/../app/controllers/RegistroLaborController.php";


$basePath = "/p-php/prueba-php/public";
$requestUri = $_SERVER["REQUEST_URI"];


if (strpos($requestUri, $basePath) === 0) {
    $request = substr($requestUri, strlen($basePath));
} else {
    $request = $requestUri;
}

$request = strtok($request, '?');

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

