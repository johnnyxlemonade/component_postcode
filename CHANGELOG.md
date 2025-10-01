# 📖 Changelog

## [2.0.0] - 2025-10-02
### Added
- Input normalization for postal codes (handles hyphens, spaces).
- `FormatterRegistry` supports overwriting existing formatters (`withAdded()`).
- Comprehensive integration tests for postcode formatting, including edge cases.
- PHPStan Level 10 + Strict Rules configuration for static analysis.

### Changed
- **BC BREAK**: `FormatterRegistry::get()` now throws `UnknownCountryException` instead of returning `null`.
- Most formatters refactored to use `PostcodeValidationTrait`.
- Improved exception messages and strict `preg_match` validation.

### Fixed
- Missing imports for functions (`substr`, `str_starts_with`, `preg_match`, etc.) in several formatters.
- Correct handling of `UnknownCountryException` during lookups.

### Tests
- Full PHPUnit test suite for `PostcodeFormatter` and `FormatterRegistry`.
- Integration tests for normalization and invalid input handling.
- PHPStan static analysis with **Level 10 + Strict Rules**, fully passing with 0 errors.

## [1.0.0] - 2025-10-01
### Initial Release
- First stable release with `PostcodeFormatter`, country-specific formatters,
  exception-based validation, and Composer integration.

## [Unreleased]

## [0.2.0] – 2023-01-01
### Changed
- Replaced all `CountryPostcodeFormatter::format()` implementations to **throw exceptions** instead of returning `null`.
- Unified interface contract: `format(string $postcode): string` with `InvalidPostcodeException` on error.
- Updated `PostcodeFormatter` to remove `null` handling.
- Added `PostcodeErrorCode` enum with translation keys (`error.invalid_postcode`, `error.unknown_country`, `error.unsupported_value`).
- Added `PostcodeException` marker interface with `getValue()` contract.
- Extended `InvalidPostcodeException` and `UnknownCountryException` to store original values (`getPostcode()`, `getCountry()`).
- Updated multiple country formatters (`AD`, `AL`, `AT`, `BA`, `BE`, `BG`, `BY`, `CH`, `CY`, `CZ`, `DE`, `DK`, `EE`, `ES`, `FI`, `FR`, `GB`, `GR`, `HR`, `HU`, `IE`, `IS`, `IT`, `LI`, `LT`, `LU`, `LV`, `MC`, `MD`, `ME`, `MK`, `MT`, `NL`, `NO`, `PL`, `PT`, `RO`, `RS`, `RU`, `SE`, `SI`, `SK`, `SM`, `UA`, `VA`) to new exception-based contract.

### Added
- `composer.json` modernized (autoload, autoload-dev, require-dev, scripts, config).
- `README.md` and `CHANGELOG.md`.
