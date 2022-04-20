<?php /**
 *  ___ ___  ___ _____ ___ _______   _____ ___ 
 * | _ \ _ \/ _ \_   _/ _ \_   _\ \ / / _ \ __|
 * |  _/   / (_) || || (_) || |  \ V /|  _/ _| 
 * |_| |_|_\\___/ |_| \___/ |_|   |_| |_| |___|
 * @link  https://github.com/NotReeceHarris/Prototype
 * @author  NotReeceHarris <https://github.com/NotReeceHarris>
 * @license  GPL-3.0 License 
 * @package  Prototype-router
 */

$routes = [];

/**
 * dispatch
 *
 * @param  string $host
 * @param  string $port
 * @return function $callback
 */
function serve(string|bool $host = false, string|bool $port = false) {
    global $routes;

    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {$link = "https";} else {$link = "http";}
    $link .= "://" . $_SERVER['HTTP_HOST'];

    /* Validate host */
    if ($host !== $link && $host !== false) {
        throwError('500', 'Your host is set as "' . $host . '" however you visit from "' . $link . '"');
    }

    /* Validate port */
    if ($port !== $_SERVER['SERVER_PORT'] && $port !== false) {
        throwError('500', 'Your port is set as "' . $port . '" however you visit from "' . $_SERVER['SERVER_PORT'] . '"');
    }

    /* Validate url */
    $link .= $_SERVER['REQUEST_URI'] . "?" . $_SERVER['QUERY_STRING'];
    $path = filter_var($link, FILTER_VALIDATE_URL);

    if (empty($path)) {
        throwError('400', 'Malformed url');
    } else {
        $path = parse_url($path, PHP_URL_PATH);
    }

    /* Prepare path */

    $path = trim($path, '/');
    $path = explode('?', $path)[0];
    $callback = null;
    $params = [];

    /* Compartmentalize */

    foreach ($routes as $route) {

        $routePath = trim($route['path'], '/');
        $routePath = preg_replace('/{[^}]+}/', '(.+)', $routePath);
        $routePath = rtrim($routePath, '?');

        if (preg_match("%^{$routePath}$%", $path, $matches) === 1) {
            $callback = $route;
            $params = array_slice($matches, 1);
            break;
        }
    }

    /* 404 Page return */

    if(!$callback || !is_callable($callback['callback'])) {
        if (isset($routes['Error400'])) {
            redirect('Error400');
        } else {
            throwError('404', 'Sorry, the page you are looking for could not be found.');
        }
    }

    /* 405 Page return */

    if (!in_array($_SERVER["REQUEST_METHOD"], $callback['method']) && $callback['method'] !== []) {
        throwError('405', 'Method "' . $_SERVER["REQUEST_METHOD"] . '" not allowed');	
    }

    /* Callback */
    echo call_user_func_array($callback['callback'], $params);
}

/**
 * route
 *
 * @param  string $name
 * @param  string $path
 * @param  function $callback
 * @param  array $method
 * @return void
 */
function route($name, $path, $callback, $method = []) {
    global $routes;

    $routes[$name] = [
        'path' => $path,
        'method' => $method,
        'callback' => $callback
    ];
}