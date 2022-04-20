<?php /**
 *  ___ ___  ___ _____ ___ _______   _____ ___ 
 * | _ \ _ \/ _ \_   _/ _ \_   _\ \ / / _ \ __|
 * |  _/   / (_) || || (_) || |  \ V /|  _/ _| 
 * |_| |_|_\\___/ |_| \___/ |_|   |_| |_| |___|
 * @link  https://github.com/NotReeceHarris/Prototype
 * @author  NotReeceHarris <https://github.com/NotReeceHarris>
 * @license  GPL-3.0 License 
 * @package  Prototype-templater
 */

/**
 * template
 *
 * @param  string $file
 * @param  array $args
 * @return string $content
 */
function template($file, $args = []) {
    $filePath = __DIR__ . '/../templates/' . $file;

    if (!file_exists($filePath)) {
        throwError('500', 'The template file "' . $file . '" does not exist.');
    }

    if (is_array($args)) {
        extract($args);
    }

    ob_start();
    include $filePath;
    $html = ob_get_clean();
    $search = array(
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s',
        '/<!--(.|\s)*?-->/'
    );
    $replace = array('>', '<', '\\1');
    return preg_replace($search, $replace, $html);
}