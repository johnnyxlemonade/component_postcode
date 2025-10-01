<?php declare(strict_types=1);

namespace Lemonade\Postcode;

use Lemonade\Postcode\Exception\UnknownCountryException;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

use function preg_match;
use function str_replace;
use function strtoupper;

/**
 * PostcodeFormatter
 *
 * Core component of the Lemonade Postcode package.
 * Provides unified API for normalization, validation and formatting
 * of postal codes across multiple countries.
 *
 * Uses a {@see FormatterRegistry} to resolve {@see CountryPostcodeFormatter}
 * implementations, which encapsulate country-specific validation rules.
 *
 * This class is part of the Lemonade Framework infrastructure and is intended
 * as the main entry point for working with postal code formatting and validation.
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @author      Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
final class PostcodeFormatter
{
    public function __construct(
        protected readonly FormatterRegistry $registry
    ) {}

    /**
     * @throws InvalidPostcodeException
     * @throws UnknownCountryException
     */
    public function format(string $country, string $postcode): string
    {
        $normalized = $this->normalize($postcode);
        $this->validateNormalized($normalized);

        $formatter = $this->registry->get($country);

        return $formatter->format($normalized);
    }

    public function isSupportedCountry(string $country): bool
    {
        return $this->registry->has($country);
    }

    private function normalize(string $postcode): string
    {
        return strtoupper(str_replace([' ', '-'], '', $postcode));
    }

    private function validateNormalized(string $postcode): void
    {
        if (preg_match('/^[A-Z0-9]+$/', $postcode) !== 1) {
            throw new InvalidPostcodeException($postcode);
        }
    }
}
