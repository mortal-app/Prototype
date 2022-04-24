---
layout: default
title: Firewall
parent: Syntax
nav_order: 5
---

# Firewall
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## Csrf

### `generateCsrfToken()`
Example
```php 
/**
 * generateCsrfToken
 *
 * @return string $token
 */
 
$csrf_token = generateCsrfToken(); // "g44gfDT3smMkuyC3NTLQd67QRa69XTbK"
```

---

### `validateCsrfToken(token:string)`
Example
```php 
/**
 * validateCsrfToken
 *
 * @param  string $token
 * @return boolean $valid
 */
 
generateCsrfToken(); // "g44gfDT3smMkuyC3NTLQd67QRa69XTbK"
validateCsrfToken("g44gfDT3smMkuyC3NTLQd67QRa69XTbK"); // true
validateCsrfToken("00000000000000000000000000000000"); // false
```

## Validation

### `validateEmail(email:string)`
Example
```php 
/**
 * validateEmail
 *
 * @param  string $email
 * @return boolean $valid
 */
 
validateEmail("reeceharris@email.com"); // true
validateEmail("reeceharris$email.com"); // false
```

---

### `validateUrl(url:string)`
Example
```php 
/**
 * validateUrl
 *
 * @param  string $url
 * @return boolean $valid
 */
 
validateEmail("prototype.mortal.app"); // true
validateEmail("prototype,mortal,app"); // false
```

## SQL

### `connectSql(host:string, user:string, pass:string, db:string)`
Example
```php 
/**
 * connectSql
 *
 * @param  string $host
 * @param  string $user
 * @param  string $pass
 * @param  string $db
 * @return object
 */
 
$ini = parse_ini_file("config.ini");
$conn = connectSql($ini['SQL_HOST'], $ini['SQL_USER'], $ini['SQL_PASS'], $ini['SQL_DB']);
// <'object'>
```

---

### `sql_escape_real(inp:string, conn:object)`
Example
```php 
/**
 * sql_escape_real
 *
 * @param  string $string
 * @param  object $conn
 * @return string
 */
 
sql_escape_real($_POST['username'], $conn); 
// "NotReeceHarris"
```

---

### `sql_escape_mimic(inp:string)`
Example

Only use this when a database connection cannot be made, if a connection can be made use `sql_escape_real()`.
```php 
/**
 * sql_escape_mimic
 *
 * @param  string $inp
 * @return string
 */
 
sql_escape_mimic($_POST['username']);
// "NotReeceHarris"
```

## Session

### `sessionSet(key:string, value:string|null)`
Example
```php 
/**
 * sessionSet
 *
 * @param  string $key
 * @param  string|null $value
 * @return void
 */
 
sessionSet('userId', 1);
```

---

### `sessionUnset(key:string)`
Example
```php 
/**
 * sessionUnset
 *
 * @param  string $key
 * @return void
 */
 
sessionUnset('userId');
```

## Encryption

### `protoHash(inp:string, salt:string|null, algo:string|null)`
Example

By default the hash algo is `sha256` and there is a pre-defined salt, I recommend supplying your salt.
```php
/**
 * protoHash
 *
 * @param  string $inp
 * @param  string|null $salt
 * @param  string|null $algo
 * @return string
 */
 
 $hash = protoHash('foo', 'bar', 'sha256');
 // "b07f35a71618b06572fc19f936b599214017cb7c5d5850738c45fce06a12fb15"
```

### `protoEncrypt(inp:string, key:string, algo:string|null)`
Example

By default the hash encryption algo is `aes-256-ctr`.
```php
/**
 * protoEncrypt
 *
 * @param  string $inp
 * @param  string $key
 * @param  string|null $algo
 * @return string
 */
 
$encrypt = protoEncrypt('foo', 'bar', 'aes-256-ctr') 
// "KzVxUjo6HjJNd8VkAkiATysPpnNvCA==";
```

### `protoDecrypt(inp:string, key:string, algo:string|null)`
Example

By default the hash encryption algo is `aes-256-ctr`.
```php
/**
 * protoDecrypt
 *
 * @param  string $inp
 * @param  string $key
 * @param  string|null $algo
 * @return string
 */
 
$encrypt = protoDecrypt($encrypt, 'bar', 'aes-256-ctr');
// "foo"
```
