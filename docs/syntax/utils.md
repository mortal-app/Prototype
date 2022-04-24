---
layout: default
title: Utils
parent: Syntax
nav_order: 4
---

# Utils
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## `path(name:string)`
Example
```php 
/**
 * path
 *
 * @param  mixed $name
 * @return string
 */
 
path('foo');  
// /foo/bar
```

---

## `redirect(name:string, pathName:bool, params:array|null)`
Example
```php 
/**
 * redirect
 *
 * @param  string $name
 * @param  array|null $params
 * @param  bool|null $pathName
 * @return void
 */
 
redirect('/foo/bar', false, ['id'=>1]); 
// redirect > /foo/bar?id=1

redirect('foo', true, ['id'=>1]); 
// redirect > /foo/bar?id=1
```

---

## `asset(name:string)`
Example
```php 
/**
 * asset
 *
 * @param  string $name
 * @return string
 */
 
asset('img/foo.png');  
// /static/img/foo.png
```

---

## `throwError(errorCode:string, message:string)`
Example
```php 
/**
 * throwError
 *
 * @param  string $errorCode
 * @param  string $message
 * @return void
 */
 
throwError('Tea', 'Tea is an aromatic beverage prepared by pouring hot or boiling water over cured or fresh leaves of Camellia sinensis');
```
