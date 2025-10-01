<?php declare(strict_types=1);

namespace Lemonade\Postcode;

use Lemonade\Postcode\Exception\UnknownCountryException;

use function array_keys;
use function strtoupper;

/**
 * FormatterRegistry
 *
 * Central registry of available {@see CountryPostcodeFormatter} implementations.
 * Provides a lookup mechanism for country-specific formatters and ensures
 * consistent normalization of country codes.
 *
 * The registry is designed as immutable. It can be extended by creating
 * a new instance via {@see FormatterRegistry::withAdded()}.
 *
 * This class is part of the Lemonade Postcode component and acts as
 * an infrastructure utility used internally by {@see PostcodeFormatter},
 * but can also be extended or replaced by user code.
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
     * @param array<string, CountryPostcodeFormatter> $formatters
     */
    public function __construct(array $formatters = [])
    {
        $normalized = [];
        foreach ($formatters as $code => $formatter) {
            $normalized[$this->normalizeCode($code)] = $formatter;
        }
        $this->formatters = $normalized;
    }

    /**
     * Returns a new registry instance with the given formatter added.
     */
    public function withAdded(string $country, CountryPostcodeFormatter $formatter): self
    {
        $new = $this->formatters;
        $new[$this->normalizeCode($country)] = $formatter;

        return new self($new);
    }

    public function get(string $country): CountryPostcodeFormatter
    {
        $normalizedCode = $this->normalizeCode($country);

        if (!isset($this->formatters[$normalizedCode])) {
            throw new UnknownCountryException($country);
        }

        return $this->formatters[$normalizedCode];
    }

    public function has(string $country): bool
    {
        return isset($this->formatters[$this->normalizeCode($country)]);
    }

    /**
     * @return string[]
     */
    public function listCountries(): array
    {
        return array_keys($this->formatters);
    }

    private function normalizeCode(string $country): string
    {
        return strtoupper($country);
    }
}
