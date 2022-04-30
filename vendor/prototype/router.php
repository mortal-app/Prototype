<?php

/**
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
 * @param  array|null $config
 * @return function $callback
 */
function serve(array|null $config = [])
{
    global $routes;

    $link = $_SERVER['HTTP_ORIGIN'];

    /* Validate host */
    if (isset($config['host']) && strtolower($config['host']) !== strtolower($link)) {
        throwError('403 Forbidden', 'Your host is set as "' . $config['host'] . '" however you visit from "' . $link . '"');
    }

    /* Validate port */
    if (isset($config['port']) && strval($config['port']) !== $_SERVER['SERVER_PORT']) {
        throwError('403 Forbidden', 'Your port is set as "' . $config['port'] . '" however you visit from "' . $_SERVER['SERVER_PORT'] . '"');
    }

    /* Validate url */
    $link .= $_SERVER['REQUEST_URI'] . "?" . $_SERVER['QUERY_STRING'];
    $path = filter_var($link, FILTER_VALIDATE_URL);

    if (empty($path)) {
        throwError('400 Bad Request', 'Malformed url');
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
    if (!$callback || !is_callable($callback['callback'])) {
        if (isset($routes['Error400'])) {
            redirect('Error400');
        } else {
            throwError('404 Not Found', 'Sorry, the page you are looking for could not be found. but you can always try again');
        }
    }

    /* 405 Page return */
    if (!in_array($_SERVER["REQUEST_METHOD"], $callback['method']) && $callback['method'] !== []) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            throwError('405 Method Not Allowed', 'The method \'' . $_SERVER["REQUEST_METHOD"] . '\' is not allowed, please try again with one of the following method(s) \'' . implode(', ', $callback['method']) . '\'');
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('content-type: application/json');
            echo json_encode([
                'status' => 405,
                'message' => 'The method \'' . $_SERVER["REQUEST_METHOD"] . '\' is not allowed, please try again with one of the following method(s) \'' . implode(', ', $callback['method']) . '\''
            ]);
            die();
        }
    }

    /* Callback */
    echo call_user_func_array($callback['callback'], $params);

    if (!empty($config['header'])) {
        foreach ($config['header'] as $key => $value) {
            header($key . ': ' . $value);
        }
    }
}

/**
 * route
 *
 * @param  string $name
 * @param  string $path
 * @param  closure $callback
 * @param  array|null $method
 * @return void
 */
function route(string $name, string $path, closure $callback, array|null $method = [])
{
    global $routes;

    $routes[$name] = [
        'path' => $path,
        'method' => $method,
        'callback' => $callback
    ];
}
