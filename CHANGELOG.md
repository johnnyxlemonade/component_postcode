# 📖 Changelog

## [Unreleased]

## [0.2.0] – 2025-09-30
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
