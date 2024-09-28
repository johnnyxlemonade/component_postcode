<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Malta
 */
class MT_Formatter implements CountryPostcodeFormatter
{

    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^([A-Z]{3})([0-9]{4})$/', $postcode, $matches) !== 1) {
            return null;
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
