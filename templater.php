<?php

/**
 * Templates a php file and returns the content
 *
 * @param  string $file
 * @param  array $args
 * @return void
 */
function template($file, $args = [])
{
    $file = __DIR__ . '/../templates/' . $file;

    if (!file_exists($file)) {
        return 'That template doesn\'t exist';
    }

    if (is_array($args)) {
        extract($args);
    }

    ob_start();
    include $file;
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


/**
 * asset
 *
 * @param  mixed $name
 * @return void
 */
function asset($name)
{
    return '/../static/' . $name;
}
