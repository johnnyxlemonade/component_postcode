# Lemonade Postcode

[![Packagist](https://img.shields.io/packagist/v/lemonade/component_postcode.svg)](https://packagist.org/packages/lemonade/component_postcode)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
![PHP Version](https://img.shields.io/badge/php-8.1%20--%208.5-blue)
[![Tests](https://img.shields.io/badge/tests-passing-brightgreen.svg)](vendor/bin/phpunit)

A lightweight PHP library for validating and formatting international postal codes (ZIP/PSC).  
Provides country-specific formatters, unified exception handling, and clear error codes for integration in forms, APIs, and e-commerce applications.

---


## ✨ Features

- ✅ Validation and normalization of postal codes for multiple countries
- ✅ Country-specific formatters (`CZ`, `SK`, `DE`, `GB`, `FR`, `IT`, `…`)
- ✅ Unified API via `PostcodeFormatter`
- ✅ Strict typing (PHP 8.1+)
- ✅ Consistent error handling with `PostcodeException` and `PostcodeErrorCode` enum
- ✅ Ready for localization (`messageKey()` for translation keys)
- ✅ PSR-4 autoloading
- ✅ PHPUnit test coverage
- ✅ PHPStan **Level 10 + Strict Rules**

---

## 🚀 Installation

```bash
  composer require lemonade/component_postcode
```

---

## 🔧 Usage

```php
use Lemonade\Postcode\PostcodeFormatter;
use Lemonade\Postcode\Exception\PostcodeException;
use Lemonade\Postcode\FormatterMapper;
use Lemonade\Postcode\FormatterRegistry;

// initialize with all built-in formatters
$registry  = new FormatterRegistry(FormatterMapper::all()); // IMMUTABLE REGISTRY
$formatter = new PostcodeFormatter($registry);              // READONLY REFERENCE

try {
    $postcode = $formatter->format('CZ', '12000'); 
    // returns "120 00"
} catch (PostcodeException $e) {
    echo $e->getValue() . ' is invalid: ' . $e->getMessage();
}

```

## ➕ Custom Formatters

You can easily extend the library with your own country-specific formatters.  
Simply implement `CountryPostcodeFormatter` and register it in the `FormatterRegistry`.

Example with an **anonymous class**:

```php
use Lemonade\Postcode\PostcodeFormatter;
use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\FormatterMapper;
use Lemonade\Postcode\FormatterRegistry;
use Lemonade\Postcode\Exception\PostcodeException;

// load default formatters
$registry = new FormatterRegistry(FormatterMapper::all());

// add custom "XX" country formatter
$registry = $registry->withAdded('XX', new class implements CountryPostcodeFormatter {
    public function format(string $postcode): string
    {
        if (preg_match('/^[A-F0-9]{8}$/', $postcode) !== 1) {
            throw new \Lemonade\Postcode\Exception\InvalidPostcodeException($postcode);
        }
        return strtoupper($postcode);
    }
});

$formatter = new PostcodeFormatter($registry);

try {
    echo $formatter->format('XX', 'deadbeef'); 
    // outputs "DEADBEEF"
} catch (PostcodeException $e) {
    echo $e->getValue() . ' is invalid: ' . $e->getMessage();
}

```
---

## 📦 Country Formatters

Each country has its own `Formatter` class under `Lemonade\Postcode\Formatter`.  
Examples:

- **CZ_Formatter** – `12000` → `120 00`
- **SK_Formatter** – `81101` → `811 01`
- **PL_Formatter** – `01001` → `01-001`
- **GB_Formatter** – `SW1A1AA` → `SW1A 1AA`
- **LT_Formatter** – supports both `12345` and `LT12345`

---

## ⚠️ Exceptions

All errors are reported using dedicated exception classes.  
This makes it easy to distinguish between invalid input and unsupported countries.

- **`InvalidPostcodeException`**  
  Thrown when the postcode does not match the expected format  
  or contains an unsupported value.  
  Example: `"ABCDE"` for `CZ`.

- **`UnknownCountryException`**  
  Thrown when trying to format a postcode for an unsupported  
  or unrecognized ISO 3166-1 alpha-2 country code.  
  Example: `"XX"`.

Both exceptions implement the `PostcodeException` interface, which provides:

- `getValue()` → returns the original input (`postcode` or `country`)
- `getCode()` → stable numeric error code (`PostcodeErrorCode`)
- `getMessage()` → translation key for localization


---

## 📖 Changelog
All notable changes are documented in the [CHANGELOG.md](CHANGELOG.md).

---

## 🧪 Development & Testing
This package is fully covered by PHPUnit tests and verified with **PHPStan Level 10**.

Run PHPUnit tests:

```bash
  composer install
  vendor/bin/phpunit
  vendor/bin/phpunit -c vendor/lemonade/component_postcode/phpunit.xml --bootstrap vendor/autoload.php
```

Run static analysis (PHPStan Level 10 + Strict Rules):

```bash
  vendor/bin/phpstan analyse vendor/lemonade/component_postcode/src \
    --configuration=vendor/lemonade/component_postcode/phpstan.neon.dist \
    --memory-limit=1G

```
