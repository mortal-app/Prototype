<?php /**
 *  ___ ___  ___ _____ ___ _______   _____ ___ 
 * | _ \ _ \/ _ \_   _/ _ \_   _\ \ / / _ \ __|
 * |  _/   / (_) || || (_) || |  \ V /|  _/ _| 
 * |_| |_|_\\___/ |_| \___/ |_|   |_| |_| |___|
 * @link  https://github.com/NotReeceHarris/Prototype
 * @author  NotReeceHarris <https://github.com/NotReeceHarris>
 * @license  GPL-3.0 License 
 * @package  Prototype-firewall
 */

require_once "utils.php";
require_once "router.php";
require_once "templater.php";
require_once "firewall.php";


/* Premade headers */

$prototype_headers_secure = [
    'Content-Type' => 'text/html; charset=utf-8',
    'X-Frame-Options'=> 'SAMEORIGIN',
    'X-XSS-Protection'=> '1; mode=block',
    'X-Content-Type-Options'=> 'nosniff',
    'Referrer-Policy'=> 'strict-origin-when-cross-origin',
    'Strict-Transport-Security'=> 'max-age=31536000; includeSubDomains; preload',
    'X-Download-Options'=> 'noopen',
    'X-Permitted-Cross-Domain-Policies'=> 'none',
    'X-Content-Security-Policy'=> "default-src 'self'",
    'X-DNS-Prefetch-Control'=> 'off',
    'X-Download-Options'=> 'noopen',
    'X-Permitted-Cross-Domain-Policies'=> 'none',
    'X-Content-Security-Policy'=> "default-src 'self'",
    'X-DNS-Prefetch-Control'=> 'off',
    'X-Download-Options'=> 'noopen',
    'X-Permitted-Cross-Domain-Policies'=> 'none',
    'X-Content-Security-Policy'=> "default-src 'self'",
    'X-DNS-Prefetch-Control'=> 'off',
    'X-Download-Options'=> 'noopen',
    'X-Permitted-Cross-Domain-Policies'=> 'none',
    'X-Content-Security-Policy'=> "default-src 'self'",
    'X-DNS-Prefetch-Control'=> 'off',
    'X-Download-Options'=> 'noopen',
    'X-Permitted-Cross-Domain-Policies'=> 'none',
    'X-Content-Security-Policy'=> "default-src 'self'",
    'X-DNS-Prefetch-Control'=> 'off',
    'X-Download-Options'=> 'noopen',
    'X-Permitted-Cross-Domain-Policies'=> 'none',
    'X-Content-Security-Policy'=> 'default-src'
];

if (isset($_SERVER['HTTP_ORIGIN'])) {

    $prototype_headers_cors = [
        'Access-Control-Allow-Origin' => $_SERVER['HTTP_ORIGIN'],
        'Access-Control-Allow-Credentials' => 'true',
        'Access-Control-Max-Age' => '86400',
    ];

}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
        $prototype_headers_cors = [
            'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS',
        ];
    }

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        $prototype_headers_cors = [
            'Access-Control-Allow-Headers' => $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'],
        ];
    }

}