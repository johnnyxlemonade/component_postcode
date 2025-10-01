<?php declare(strict_types=1);

namespace Lemonade\Postcode;

use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * CountryPostcodeFormatter
 *
 * Contract for country-specific postal code validation and formatting.
 * Each implementation encapsulates the validation rules and output
 * format required for a single ISO 3166-1 alpha-2 country code.
 *
 * Implementations are responsible for:
 * - validating that the input postcode matches the country's rules
 * - normalizing the input (e.g. stripping spaces, uppercasing)
 * - returning the canonical formatted value
 *
 * Used internally by {@see PostcodeFormatter} via {@see FormatterRegistry}.
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @author      Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
interface CountryPostcodeFormatter
{
    /**
     * Validate and format the given postcode for the specific country.
     *
     * Implementations may normalize the input (remove spaces, enforce
     * uppercase, add prefixes, etc.) before returning the canonical form.
     *
     * @param string $postcode Raw postcode input
     * @return string Canonical formatted postcode
     *
     * @throws InvalidPostcodeException If the postcode is invalid for this country
     */
    public function format(string $postcode): string;
}
