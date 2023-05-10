<?php

// Get the required route (without query string) and remove trailing slashes

use App\Controller\HomeController;

$route = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');

// $routes comes from 'routes.php' required here
$routes = require_once __DIR__ . '/../src/routes.php';

// If required route is not is $routes, return a 404 Page not found error
if (!key_exists($route, $routes)) {
    header("HTTP/1.0 404 Not Found");
    echo '<style>body { font-family: Horrible; text-align: center; text-shadow: #fff 0.2rem 0.2rem 0.2rem; color: #ff0000; font-weight: bold; text-transform: uppercase; font-family: Tahoma; font-size: 20pt; display: flex; align-items: center; justify-content: center; background: url("/assets/images/404.png") no-repeat; }</style>';
    echo '<h1>Vous êtes sur la mauvaise île<br>(erreur 404)</h1>';
    exit();
}

// Get the matching route in $routes array
$matchingRoute = $routes[$route];

// Get the FQCN of controller associated to the matching route
$controller = 'App\\Controller\\' . $matchingRoute[0];
// Get the method associated to the matching route
$method = $matchingRoute[1];
// Get the queryString values configured for the matching route (in $_GET superglobal).
// If there are additional queryString parameters, they are ignored here, and should be
// directly manage in the controller
$parameters = [];
foreach ($matchingRoute[2] ?? [] as $parameter) {
    if (isset($_GET[$parameter])) {
        $parameters[] = $_GET[$parameter];
    }
}

// instance the controller, call the method with given parameters
// controller method will return a twig template (HTML string) which is displayed here
try {
    // execute the controller
    echo (new $controller())->$method(...$parameters);
} catch (Exception $e) {
    // if an exception is thrown during controller execution
    if (isset($whoops)) {
        echo $whoops->handleException($e);
    } else {
        header("HTTP/1.0 500 Internal Server Error");
        echo '500 - Internal Server Error';
        exit();
    }
}
