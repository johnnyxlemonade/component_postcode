<?php declare(strict_types=1);

namespace Lemonade\Postcode;

use Lemonade\Postcode\Exception\UnknownCountryException;
use Lemonade\Postcode\Exception\UnsupportedCountryException;

use function array_keys;
use function strtoupper;

/**
 * FormatterRegistry
 *
 * Central registry of available {@see CountryPostcodeFormatter} implementations.
 *
 * Maintains a mapping between ISO 3166-1 alpha-2 country codes and their
 * corresponding postcode formatters.
 *
 * Custom formatters (including anonymous classes) can be registered at runtime
 * via {@see FormatterRegistry::register()}.
 *
 * Used internally by {@see PostcodeFormatter}, but can also be extended or
 * accessed directly by userland code to add support for additional countries.
 *
 * Exceptions:
 * - {@see UnsupportedCountryException} if no formatter is registered for the given country
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @author      Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
final class FormatterRegistry
{
    /**
     * @var array<string, CountryPostcodeFormatter>
     */
    private readonly array $formatters;

    /**
     * @param array<string, CountryPostcodeFormatter>|null $formatters
     */
    public function __construct(array $formatters = null)
    {
        $this->formatters = $formatters ?? FormatterMapper::all();
    }

    public function register(CountryCode $countryCode, CountryPostcodeFormatter $formatter): self
    {
        $newFormatters = [...$this->formatters, $countryCode->value => $formatter];
        return new self($newFormatters);
    }

    public function has(CountryCode $countryCode): bool
    {
        return isset($this->formatters[$countryCode->value]);
    }

    /**
     * @throws UnsupportedCountryException
     */
    public function getFormatter(CountryCode $countryCode): CountryPostcodeFormatter
    {
        return $this->formatters[$countryCode->value]
            ?? throw new UnsupportedCountryException($countryCode->value);
    }

    /**
     * @return array<string, CountryPostcodeFormatter>
     */
    public function all(): array
    {
        return $this->formatters;
    }
}
