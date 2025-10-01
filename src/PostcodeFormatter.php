<?php declare(strict_types=1);

namespace Lemonade\Postcode;

use Lemonade\Postcode\Exception\UnknownCountryException;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Exception\UnsupportedCountryException;

use function preg_match;
use function str_replace;
use function strtoupper;

/**
 * PostcodeFormatter
 *
 * Core component of the Lemonade Postcode package.
 * Provides a unified API for formatting and validating
 * postal codes across supported countries.
 *
 * Delegates the actual validation and formatting logic to
 * a {@see CountryPostcodeFormatter} implementation resolved
 * via the {@see FormatterRegistry}.
 *
 * This class is the main entry point for working with
 * postcode formatting in the Lemonade Framework.
 *
 * Exceptions:
 * - {@see InvalidPostcodeException} if the postcode does not match
 *   the validation rules for the country
 * - {@see UnsupportedCountryException} if no formatter is registered
 *   for the given country
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @author      Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
final class PostcodeFormatter
{
    public function __construct(private readonly FormatterRegistry $formatterRegistry)
    {}

    /**
     * @throws InvalidPostcodeException
     * @throws UnsupportedCountryException
     */
    public function format(CountryCode $country, string $postcode): string
    {
        $formatter = $this->formatterRegistry->getFormatter($country);

        return $formatter->format($postcode);
    }
}
