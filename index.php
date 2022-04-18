<?php

/**
 *  ___ ___  ___ _____ ___ _______   _____ ___ 
 * | _ \ _ \/ _ \_   _/ _ \_   _\ \ / / _ \ __|
 * |  _/   / (_) || || (_) || |  \ V /|  _/ _| 
 * |_| |_|_\\___/ |_| \___/ |_|   |_| |_| |___|                                             
 *
 * @author Reece harris 
 * @link https://github.com/NotReeceHarris/Prototype
 * @license GPL-3.0 License 
 * @version 1.0.0
 *
 */

require_once "./func/router.php";
require_once "./func/template.php";


route('index', '/', function () {
    return redirect('homePage');
}, ['GET']);


$path = $_SERVER['REQUEST_URI'];
dispatch($path);