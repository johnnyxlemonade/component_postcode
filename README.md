# 🍋 Lemonade Postcode

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
- ✅  PSR-4 autoloading, PHPUnit tests planned

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

$formatter = new PostcodeFormatter();

try {
    $postcode = $formatter->format('CZ', '12000'); 
    // returns "120 00"
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

- `InvalidPostcodeException` → invalid format or unsupported value  
- `UnknownCountryException` → unsupported/unknown country code  

Both implement `PostcodeException` and expose the original value through `getValue()`.

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
vendor/bin/phpunit -c vendor/lemonade/component_meta/phpunit.xml --bootstrap vendor/autoload.php
```

Run static analysis:

```bash
  composer phpstan
```
