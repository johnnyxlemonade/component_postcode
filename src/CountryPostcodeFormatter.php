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
     * Validate and format the given postcode.
     *
     * The input is already normalized (uppercase, no spaces or dashes).
     *
     * @param string $postcode Normalized postcode to validate
     * @return string Formatted postcode
     *
     * @throws InvalidPostcodeException
     */
    public function format(string $postcode): string;
}
