![](https://github.com/NotReeceHarris/NotReeceHarris/blob/main/cdn/prototype-FRAMEWORK-logo.png?raw=true)

## Minimul setup

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/aba066d14f8b4f548f05b15d386d9cc4)](https://app.codacy.com/gh/NotReeceHarris/Prototype?utm_source=github.com&utm_medium=referral&utm_content=NotReeceHarris/Prototype&utm_campaign=Badge_Grade_Settings)

```php
<?php

require_once "./func/router.php";
require_once "./func/template.php";


route('foo', '/', function () {
    return redirect('bar', ['baz'=>'Lorem']);
}, ['GET']);

route('bar', '/bar/{baz}', function ($baz) {
    return template('/home.php', ['bar'=>$baz]);
}, ['GET']);

$path = $_SERVER['REQUEST_URI'];
dispatch($path);
```

## Structured enviroment
```tree
html/
├─ func/
│  ├─ router.php
│  └ template.php
├─ template/
│  └ home.php
├─ .htaccess
└ index.php
```

## Features
- Dynamic routing
- Auto html minify
- Templating
  - pass vars
- Redirects
  - pass http params
- Paths
- Method security
