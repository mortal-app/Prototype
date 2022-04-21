<?php

require_once './src/prototype/autoload.php';

/** @param string $name 
 *  @param string $path
 *  @param function $callback
 *  @param array|optional $method
 */
route('foo', '/', function () {
    return redirect('bar', ['baz' => 'prototype'], true);
}, ['GET']);

route('bar', '/bar/', function () {
    return 'Try out ' . $_GET['baz'] . ' now!';
}, ['GET']);

serve();