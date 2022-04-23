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

## `sql_escape_mimic(inp:string)`
Example
```php 
/**
 * sql_escape_mimic
 *
 * @param  string $inp
 * @return string $out
 */
 
sql_escape_mimic("SELECT id, firstname, lastname FROM MyGuests WHERE lastname='Doe'") // "SELECT id, firstname, lastname FROM MyGuests WHERE lastname='Doe'"
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
