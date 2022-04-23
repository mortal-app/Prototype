---
layout: default
title: Templater
parent: Syntax
nav_order: 3
---

# Templater
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## `template(file:string, args:array|null)`
Example

```php 
return template('home.php', ['title'=>'Home Page']);
```

Source

```php 
/**
 * template
 *
 * @param  string $file
 * @param  array|null $args
 * @return string $content
 */
function template(string $file, array|null $args = []) {
    $filePath = __DIR__ . '/../../templates/' . $file;

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
```
