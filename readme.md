![](https://github.com/NotReeceHarris/NotReeceHarris/blob/main/cdn/prototype-logo.png?raw=true)

[![Codacy Security Scan](https://github.com/NotReeceHarris/Prototype/actions/workflows/codacy.yml/badge.svg)](https://github.com/NotReeceHarris/Prototype/actions/workflows/codacy.yml)

---
## ⚙️ Minimul setup
```php
# index.php

require_once __DIR__ . './vendor/prototype/autoload.php';

route('foo', '/', function () {
    return redirect('bar', ['baz' => 'prototype'], true);
}, ['GET']);

route('bar', '/bar/', function () {
    return 'Try out ' . $_GET['baz'] . ' now!';
}, ['GET']);

serve('https://mortal.app', 80);
```
```apache
# .htaccess // Apache

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteRule ^index\.php$ - [L]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . /index.php [L]
</IfModule>
```
```nginx
# nginx.conf // Ngix

location = /index.php { }

location / {
  if (!-e $request_filename){
    rewrite ^(.*)$ /index.php break;
  }
}
```

---

## 📦 Structured enviroment
```
root
    |-- vendor/
    |   `-- prototype/
    |       |-- autoload.php
    |       |-- firewall.php
    |       |-- router.php
    |       |-- templater.php
    |       `-- utils.php
    |
    |-- static/
    |   `-- favicon.png
    | 
    |-- templates/
    |   `-- home.php
    | 
    |-- .htaccess
    `-- index.php

4 directories, 8 files
```

## 🔗 Links
- [Development branch](https://github.com/NotReeceHarris/Prototype/tree/Development)
- [Docs](https://prototype.mortal.app/#)
- [Submit Security Vulnerabilities](https://github.com/NotReeceHarris/Prototype/wiki)
- [Codacy](https://app.codacy.com/gh/NotReeceHarris/Prototype/dashboard)
