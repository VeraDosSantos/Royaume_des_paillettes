<?php
require_once(__DIR__ . "/function.php");
require_once(__DIR__ . '/db.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'HomeController.php',
    //la connection
    '/login' => 'LoginController.php',
    '/logout' => 'LogoutController.php',
    '/register' => 'RegisterController.php',
    //pour les admins
    '/subject' => 'SubjectCreateController.php',

];

if (array_key_exists($uri, $routes)) {
    require_once(__DIR__ . "/../app/Controllers/" . $routes[$uri]);
} else {
    http_response_code(404);
    require_once(__DIR__ . '/../app/Controllers/404.php');
}
