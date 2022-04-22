<?php

require_once __DIR__ . './vendor/prototype/autoload.php';

route('foo', '/', function () {
    return redirect('bar', ['baz' => 'prototype'], true);
}, ['GET']);

route('bar', '/bar/', function () {
    header('Framework: Prototype 1.0.2');
    return 'hello world';
}, ['GET']);

serve([
    'host' => 'http://localhost',
    'port' => 80,
    'header' => $prototype_headers_secure
]);