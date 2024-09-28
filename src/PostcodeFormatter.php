<?php declare(strict_types=1);

/**
 * Class PostcodeFormatter
 *
 * Lemonade\Postcode
 * @author Honza Mudrak <honzamudrak@gmail.com>
 */

namespace Lemonade\Postcode;
use Lemonade\Postcode\UnknownCountryException;
use Lemonade\Postcode\InvalidPostcodeException;

/**
 * Formatovani a validace postovniho smerovaciho cisla
 */
final class PostcodeFormatter
{

    /**
     * Formatovace postovnich smerovacich cisel podle zemi, indexovane podle kodu zeme
     * @var array<string, CountryPostcodeFormatter|null>
     */
    private array $formatters = [];

    /**
     * @param string $country
     * @param string $postcode
     * @return string
     * @throws InvalidPostcodeException
     * @throws UnknownCountryException
     */
    public function format(string $country, string $postcode) : string
    {
        $postcode = str_replace([' ', '-'], '', $postcode);
        $postcode = strtoupper($postcode);

        $formatter = $this->getFormatter($country);

        if ($formatter === null) {
            throw new UnknownCountryException('Neznama zeme: ' . $country);
        }

        if (preg_match('/^[A-Z0-9]+$/', $postcode) !== 1) {
            throw new InvalidPostcodeException('Nezname PSC: ' . $postcode);
        }

        $formatted = $formatter->format($postcode);

        if ($formatted === null) {
            throw new InvalidPostcodeException('Nezname PSC: ' . $postcode);
        }

        return $formatted;
    }

    /**
     * @param string $country
     * @return bool
     */
    public function isSupportedCountry(string $country) : bool
    {
        return $this->getFormatter($country) !== null;
    }

    /**
     * @param string $country
     * @return CountryPostcodeFormatter|null
     */
    protected function getFormatter(string $country) : ?CountryPostcodeFormatter
    {
        if (array_key_exists($country, $this->formatters)) {
            return $this->formatters[$country];
        }

        return $this->formatters[$country] = $this->doGetFormatter($country);
    }

    /**
     * @param string $country
     * @return CountryPostcodeFormatter|null
     */
    protected function doGetFormatter(string $country): ?CountryPostcodeFormatter
    {
        $country = strtoupper($country);

        if (preg_match('/^[A-Z]{2}$/', $country) !== 1) {
            return null;
        }

        /** @var class-string<CountryPostcodeFormatter> $class */
        $class = __NAMESPACE__ . '\\Formatter\\' . $country . '_Formatter';

        return class_exists($class) ? new $class() : null;
    }
}