<?php

$routes = [];

/**
 * route
 *
 * @param  mixed $name
 * @param  mixed $path
 * @param  mixed $callback
 * @param  mixed $method
 * @return void
 */
function route(String $name, String $path, Closure $callback, Array $method = []) 
{
    global $routes;

    $routes[$name] = [
        'path' => $path,
        'method' => $method,
        'callback' => $callback
    ];
}

/**
 * dispatch
 *
 * @param  mixed $path
 * @return void
 */
function dispatch(String $path) 
{
    global $routes;
    $path = trim($path, '/');
    $path = explode('?', $path)[0];
    $callback = null;
    $params = [];

    foreach ($routes as $route => $handler) {

        $routePath = trim($handler['path'], '/');
        $routePath = preg_replace('/{[^}]+}/', '(.+)', $routePath);
        $routePath = rtrim($routePath, '?');

        if (preg_match("%^{$routePath}$%", $path, $matches) === 1) {
            $callback = $handler;
            $params = array_slice($matches, 1);
            break;
        }
    }

    if(!$callback || !is_callable($callback['callback'])) {
        if (isset($routes['404'])) {
            return template( '404.template.php' );
        } else {
            header('HTTP/1.1 404 Not Found');
            echo '<h1>404 Not Found</h1>';
            return;
        }
    }

    if (!in_array($_SERVER["REQUEST_METHOD"], $callback['method']) && $callback['method'] !== []) {
        header('HTTP/1.1 405 Method Not Allowed');
        echo '<h1>405 Method Not Allowed</h1>';
        return;
    }

    echo call_user_func($callback['callback'], ...$params);
}

/**
 * path
 *
 * @param  mixed $name
 * @return void
 */
function path(String $name) 
{
    global $routes;
    return $routes[$name]['path'];
}

/**
 * redirect
 *
 * @param  mixed $name
 * @param  mixed $params
 * @return void
 */
function redirect(String $name, Array $params = []) 
{
    $path = path($name);
    $query = http_build_query($params);
    header("Location: {$path}?{$query}");
    exit;
}