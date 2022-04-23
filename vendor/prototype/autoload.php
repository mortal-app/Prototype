<?php

/**
 *  ___ ___  ___ _____ ___ _______   _____ ___ 
 * | _ \ _ \/ _ \_   _/ _ \_   _\ \ / / _ \ __|
 * |  _/   / (_) || || (_) || |  \ V /|  _/ _| 
 * |_| |_|_\\___/ |_| \___/ |_|   |_| |_| |___|
 * @link  https://github.com/NotReeceHarris/Prototype
 * @author  NotReeceHarris <https://github.com/NotReeceHarris>
 * @license  GPL-3.0 License 
 * @package  Prototype-autoload
 */

foreach (glob(__DIR__ . '/*.php') as $file) {
    require_once $file;
}

set_error_handler(function($errno, $errstr, $errfile, $errline ){
    $error = new ErrorException($errstr, $errno, 0, $errfile, $errline);
    throwError('File: ' . $errfile . '; Line: ' . $errline, $error );
});

/* Build url */
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $link = "https://";
} else {
    $link = "http://";
}

$_SERVER['HTTP_ORIGIN'] = $link . $_SERVER['HTTP_HOST'];

/* Secure */
$prototype_header_secure = [
    'Content-Type' => 'text/html; charset=utf-8',
    'X-Frame-Options' => 'SAMEORIGIN',
    'X-XSS-Protection' => '1; mode=block',
    'X-Content-Type-Options' => 'nosniff',
    'Referrer-Policy' => 'strict-origin-when-cross-origin',
    'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains; preload',
    'X-Download-Options' => 'noopen',
    'X-Permitted-Cross-Domain-Policies' => 'none',
    'X-Content-Security-Policy' => "default-src 'self'",
    'X-DNS-Prefetch-Control' => 'off',
    'X-Download-Options' => 'noopen',
    'X-Permitted-Cross-Domain-Policies' => 'none',
    'X-Content-Security-Policy' => "default-src 'self'",
    'X-DNS-Prefetch-Control' => 'off',
    'X-Download-Options' => 'noopen',
    'X-Permitted-Cross-Domain-Policies' => 'none',
    'X-Content-Security-Policy' => "default-src 'self'",
    'X-DNS-Prefetch-Control' => 'off',
    'X-Download-Options' => 'noopen',
    'X-Permitted-Cross-Domain-Policies' => 'none',
    'X-Content-Security-Policy' => "default-src 'self'",
    'X-DNS-Prefetch-Control' => 'off',
    'X-Download-Options' => 'noopen',
    'X-Permitted-Cross-Domain-Policies' => 'none',
    'X-Content-Security-Policy' => "default-src 'self'",
    'X-DNS-Prefetch-Control' => 'off',
    'X-Download-Options' => 'noopen',
    'X-Permitted-Cross-Domain-Policies' => 'none',
    'X-Content-Security-Policy' => 'default-src'
];

/* Cors */
$prototype_header_cors;
if (isset($_SERVER['HTTP_ORIGIN'])) {
    $prototype_header_cors = [
        'Access-Control-Allow-Origin' => $_SERVER['HTTP_ORIGIN'],
        'Access-Control-Allow-Credentials' => 'true',
        'Access-Control-Max-Age' => '86400',
        'Content-Security-Policy' => "default-src 'self'",
    ];
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
        $prototype_header_cors = [
            'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS',
        ];
    }
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        $prototype_header_cors = [
            'Access-Control-Allow-Headers' => $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'],
        ];
    }
}

/* Cache */
$prototype_header_nocache = [
    'Cache-Control' => 'no-cache, no-store, must-revalidate',
    'Pragma' => 'no-cache',
    'Expires' => '0',
];

$prototype_header_cache = [
    'Cache-Control' => 'public, max-age=604800, immutable',
];
