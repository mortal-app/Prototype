---
layout: default
title: Minimal setup
nav_order: 1
description: "Prototype gives you a simple, secure, scalable, and minimal framework. while handling complex features."
permalink: /
---

# Minimal PHP Framework
{: .fs-9 }

Prototype gives you a simple, secure, scalable, and minimal framework. while handling complex features.
{: .fs-6 .fw-300 }

[Get started now](#getting-started){: .btn .btn-primary .fs-5 .mb-4 .mb-md-0 .mr-2 } [View it on GitHub](https://github.com/NotReeceHarris/Prototype){: .btn .fs-5 .mb-4 .mb-md-0 }

---

## Getting started

### Dependencies

Prototype is built for [PHP](https://www.php.net/), a general-purpose scripting language that is especially suited to web development. View the [docs](https://www.php.net/docs.php) for more information. Prototype requires no special plugins and can run on Apache, Ngix, or most php servers.

### Quick start: Use prototype as a Static router

1. Setup your enviroment

```
root
    |-- vendor/
    |   `-- prototype/
    |-- static/
    |-- templates/
    |-- .htaccess
    `-- index.php
```

<small>You must have rewrites enabled on your server,  if your using apache here is the `mod_rewrite` [doc](https://httpd.apache.org/docs/current/mod/mod_rewrite.html)</small>

### Setup configuration

1. Setup rewite config

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

2. Setup `index.php`

```php
require_once __DIR__ . './vendor/prototype/autoload.php';

route('foo', '/', function () {
    return 'hello world';
}, ['GET']);

serve([
    'host' => 'http://localhost',
    'port' => 80,
    'header' => $prototype_header_secure
]);
```

### Configure Prototype

- [See configuration options]({{ site.baseurl }}{% link docs/configuration.md %})

---

### License

Prototype is distributed by an [GPL-3.0 License ](https://github.com/NotReeceHarris/Prototype/blob/Production/LICENSE).

### Contributing

When contributing to this repository, please first discuss the change you wish to make via issue,
email, or any other method with the owners of this repository before making a change. Read more about becoming a contributor in [our GitHub repo](https://github.com/notreeceharris/prototype#contributing).

#### Thank you to the contributors of Prototype!

<ul class="list-style-none">
{% for contributor in site.github.contributors %}
  <li class="d-inline-block mr-1">
     <a href="{{ contributor.html_url }}"><img src="{{ contributor.avatar_url }}" width="32" height="32" alt="{{ contributor.login }}"/></a>
  </li>
{% endfor %}
</ul>

### Code of Conduct

Prototype is committed to fostering a welcoming community.

[View our Code of Conduct](https://github.com/NotReeceHarris/Prototype/blob/Production/CODE_OF_CONDUCT.md) on our GitHub repository.
