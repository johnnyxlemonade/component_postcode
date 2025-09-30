<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Francie
 */
class FR_Formatter implements CountryPostcodeFormatter
{
    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {

        if (preg_match('/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
