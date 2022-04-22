![](https://github.com/NotReeceHarris/NotReeceHarris/blob/main/cdn/prototype-FRAMEWORK-logo.png?raw=true)

[![Codacy Security Scan](https://github.com/NotReeceHarris/Prototype/actions/workflows/codacy.yml/badge.svg)](https://github.com/NotReeceHarris/Prototype/actions/workflows/codacy.yml)

## ⚙️ Minimul setup
```php
require_once './src/prototype/autoload.php';

/** @param string $name 
 *  @param string $path
 *  @param function $callback
 *  @param array|optional $method
 */
route('foo', '/', function () {
    return redirect('bar', ['baz' => 'prototype'], true);
}, ['GET']);

route('bar', '/bar/', function () {
    return 'Try out ' . $_GET['baz'] . ' now!';
}, ['GET']);

serve();
```

## 📦 Structured enviroment
```php
html/
├─ src/
│  └ prototype/
├─ template/
│  └ home.php
├─ .htaccess
└ index.php
```

## 🔗 Links
- [Development branch](https://github.com/NotReeceHarris/Prototype/tree/Development)
- [Wiki](https://github.com/NotReeceHarris/Prototype/wiki)
- [Submit Security Vulnerabilities](https://github.com/NotReeceHarris/Prototype/wiki)
- [Codacy](https://app.codacy.com/gh/NotReeceHarris/Prototype/dashboard)
