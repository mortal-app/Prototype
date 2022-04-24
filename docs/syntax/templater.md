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
// index.php

/**
 * template
 *
 * @param  string $file
 * @param  array|null $args
 * @return string
 */
 
return template('home.php', ['content'=>'Hello World']);
```

```php
// templates/home.php

<strong><?php echo $content ?></strong>
```

### Boilerplate inside template
Example

Use case: Say you have a boilerplate and don't want to copy-paste it into every file now you can store that boilerplate in 1 file importing it into multiple
```php
// templates/home.php

<?php ob_start(); ?>

<strong><?php echo $content ?></strong>

<?php $html = ob_get_clean(); ?>

<?php echo template('components\dashboard.php', [
    'title' => 'home',
    'content' => $html
]) ?>
```
