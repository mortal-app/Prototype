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

## `generateCsrfToken()`
Example
```php 
/**
 * generateCsrfToken
 *
 * @return string $token
 */
 
$csrf_token = generateCsrfToken() // "g44gfDT3smMkuyC3NTLQd67QRa69XTbK"
```

---

## `validateCsrfToken(token:string)`
Example
```php 
/**
 * validateCsrfToken
 *
 * @param  string $token
 * @return boolean $valid
 */
 
generateCsrfToken() // "g44gfDT3smMkuyC3NTLQd67QRa69XTbK"
validateCsrfToken("g44gfDT3smMkuyC3NTLQd67QRa69XTbK") // true
validateCsrfToken("00000000000000000000000000000000") // false
```

---

## `validateEmail(email:string)`
Example
```php 
/**
 * validateEmail
 *
 * @param  string $email
 * @return boolean $valid
 */
 
validateEmail("reeceharris@email.com") // true
validateEmail("reeceharris$email.com") // false
```

---

## `validateUrl(url:string)`
Example
```php 
/**
 * validateUrl
 *
 * @param  string $url
 * @return boolean $valid
 */
 
validateEmail("prototype.mortal.app") // true
validateEmail("prototype,mortal,app") // false
```

---

## `connectSql(host:string, user:string, pass:string, db:string)`
Example
```php 
/**
 * connectSql
 *
 * @param  string $host
 * @param  string $user
 * @param  string $pass
 * @param  string $db
 * @return object $conn
 */
 
$ini = parse_ini_file("config.ini")
$conn = connectSql($ini['SQL_HOST'], $ini['SQL_USER'], $ini['SQL_PASS'], $ini['SQL_DB'])
```

---

## `sql_escape_real(inp:string, conn:object)`
Example
```php 
/**
 * sql_escape_real
 *
 * @param  string $string
 * @param  object $conn
 * @return string $string
 */
 
$secureSql = sql_escape_real($_POST['username'], $conn) // "NotReeceHarris"
```

---

## `sql_escape_mimic(inp:string)`
Example
```php 
/**
 * sql_escape_mimic
 *
 * @param  string $inp
 * @return string $out
 */
 
$someWhatSecureSql = sql_escape_mimic($_POST['username'])
```
