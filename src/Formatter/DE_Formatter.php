<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Nemecko
 */
class DE_Formatter implements CountryPostcodeFormatter
{
    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {

        if (preg_match('/^((?:0[1-46-9]\d{3})|(?:[1-357-9]\d{4})|(?:4[0-24-9]\d{3})|(?:6[013-9]\d{3}))$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
