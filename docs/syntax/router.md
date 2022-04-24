---
layout: default
title: Router
parent: Syntax
nav_order: 2
---

# Router
{: .no_toc }
 
## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## `route(name:string, path:string, callback:closure, method:array|null)`
Example
```php
/**
 * route
 *
 * @param  string $name
 * @param  string $path
 * @param  closure $callback
 * @param  array|null $method
 * @return void
 */
 
route('foo', '/', function () {
    return 'bar';
}, ['GET']);
```

## `serve(config:array|null)`
Example
```php
/**
 * dispatch
 *
 * @param  array|null $config
 * @return function
 */
 
serve([
    'host' => 'http://localhost',
    'port' => 80,
    'header' => $prototype_header_cors,
]);
```
