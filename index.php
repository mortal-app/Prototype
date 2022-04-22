<?php

require_once __DIR__ . './vendor/prototype/autoload.php';

route('foo', '/', function () {
    return redirect('bar', ['baz' => 'prototype'], true);
}, ['GET']);

route('bar', '/bar/', function () {
    
}, ['GET']);

serve('https://localhost', 80);