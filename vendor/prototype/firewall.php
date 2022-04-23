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

/**
 * generateCsrfToken
 *
 * @return string $token
 */
function generateCsrfToken() {
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
    return hash('sha256', $token);
}

/**
 * validateCsrfToken
 *
 * @param  string $token
 * @return boolean $valid
 */
function validateCsrfToken(string $token) {
    if (isset($_SESSION['csrf_token']) && hash('sha256', $_SESSION['csrf_token']) === $token) {
        unset($_SESSION['csrf_token']);
        return true;
    }
    return false;
}

/**
 * validateEmail
 *
 * @param  string $email
 * @return boolean $valid
 */
function validateEmail(string $email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * validateUrl
 *
 * @param  string $url
 * @return boolean $valid
 */
function validateUrl(string $url) {
    return filter_var($url, FILTER_VALIDATE_URL);
}

/**
 * connectSql
 *
 * @param  string $host
 * @param  string $user
 * @param  string $pass
 * @param  string $db
 * @return object $conn
 */
function connectSql(string $host, string $user, string $pass, string $db) {
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        throwError('500 Internal Server Error', 'Failed to connect to MySQL: ' . $conn->connect_error);
    }
    return $conn;
}

/**
 * sql_escape_real
 *
 * @param  string $string
 * @param  object $conn
 * @return string $string
 */
function sql_escape_real(string $string, object $conn) {
    return mysqli_real_escape_string($conn, $string);
}

/**
 * sql_escape_mimic
 *
 * @param  string $inp
 * @return string $out
 */
function sql_escape_mimic(string $inp) { 
    if(is_array($inp)) 
        return array_map(__METHOD__, $inp); 

    if(!empty($inp) && is_string($inp)) { 
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
    } 

    return $inp; 
}

/**
 * sessionSet
 *
 * @param  string $key
 * @param  string|null $value
 * @return void
 */
function sessionSet(string $key, string|null $value = null) {
    if ($value === null) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }
    $_SESSION[$key] = $value;
}

/**
 * sessionUnset
 *
 * @param  string $key
 * @return void
 */
function sessionUnset(string $key) {
    if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
    }
}