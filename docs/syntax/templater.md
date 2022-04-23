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
  
```php
/**
 * template
 *
 * @param  string $file
 * @param  array|null $args
 * @return string $content
 */
 
return template('home.php', ['title'=>'Home Page']);
```
