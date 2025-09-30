<?php declare(strict_types=1);

namespace Lemonade\Postcode;

use Lemonade\Postcode\Exception\UnknownCountryException;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Formatting and validation of postal codes
 */
final class PostcodeFormatter
{
    /** @var array<string, CountryPostcodeFormatter|null> */
    private array $formatters = [];

    /**
     * @throws InvalidPostcodeException
     * @throws UnknownCountryException
     */
    public function format(string $country, string $postcode): string
    {
        $normalized = $this->normalize($postcode);
        $this->validateNormalized($normalized);

        $formatter = $this->getRequiredFormatter($country);

        return $formatter->format($normalized);
    }

    public function isSupportedCountry(string $country): bool
    {
        return $this->getFormatter($country) !== null;
    }

    private function getRequiredFormatter(string $country): CountryPostcodeFormatter
    {
        $formatter = $this->getFormatter($country);
        if ($formatter === null) {
            throw new UnknownCountryException($country);
        }
        return $formatter;
    }

    private function getFormatter(string $country): ?CountryPostcodeFormatter
    {
        return $this->formatters[$country] ??= $this->resolveFormatter($country);
    }

    private function resolveFormatter(string $country): ?CountryPostcodeFormatter
    {
        $upper = strtoupper($country);
        if (preg_match('/^[A-Z]{2}$/', $upper) !== 1) {
            return null;
        }

        $class = __NAMESPACE__ . '\\Formatter\\' . $upper . '_Formatter';

        return class_exists($class) ? new $class() : null;
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
