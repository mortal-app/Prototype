<?php

require_once __DIR__ . './vendor/prototype/autoload.php';

route('foo', '/', function () {
    return 'hellow world';
    redirect('bar');
}, ['GET']);

serve([
    'host' => 'http://localhost',
    'port' => 80,
    'header' => $prototype_header_cors,
]);