![](https://github.com/NotReeceHarris/NotReeceHarris/blob/main/cdn/prototype-FRAMEWORK-logo.png?raw=true)

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/33fce443d5044910a027d0f5bd449771)](https://www.codacy.com/gh/NotReeceHarris/Prototype/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=NotReeceHarris/Prototype&amp;utm_campaign=Badge_Grade)

## Minimul setup
```php
require_once "./func/router.php";
require_once "./func/templater.php";


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
