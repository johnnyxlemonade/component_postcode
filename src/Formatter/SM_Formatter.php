<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * San marino
 */
class SM_Formatter implements CountryPostcodeFormatter
{
    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        if (substr($postcode, 0, 4) !== '4789') {
            return null;
        }

        return $postcode;
    }
}
