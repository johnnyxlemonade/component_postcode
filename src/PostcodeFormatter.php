<?php declare(strict_types=1);

namespace Lemonade\Postcode;

use Lemonade\Postcode\Exception\UnknownCountryException;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Exception\PostcodeErrorCode;

/**
 * Formátování a validace PSČ
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
        $normalized = strtoupper(str_replace([' ', '-'], '', $postcode));
        $formatter  = $this->getFormatter($country);

        if ($formatter === null) {
            throw new UnknownCountryException($country);
        }

        if (!preg_match('/^[A-Z0-9]+$/', $normalized)) {
            throw new InvalidPostcodeException($postcode);
        }

        $formatted = $formatter->format($normalized);
        if ($formatted === null) {
            throw new InvalidPostcodeException($postcode, PostcodeErrorCode::UnsupportedValue);
        }

        return $formatted;
    }

    public function isSupportedCountry(string $country): bool
    {
        return $this->getFormatter($country) !== null;
    }

    private function getFormatter(string $country): ?CountryPostcodeFormatter
    {
        return $this->formatters[$country] ??= $this->resolveFormatter($country);
    }

    private function resolveFormatter(string $country): ?CountryPostcodeFormatter
    {
        $upper = strtoupper($country);
        if (!preg_match('/^[A-Z]{2}$/', $upper)) {
            return null;
        }

        $class = __NAMESPACE__ . "\\Formatter\\{$upper}_Formatter";
        return class_exists($class) ? new $class() : null;
    }
}
