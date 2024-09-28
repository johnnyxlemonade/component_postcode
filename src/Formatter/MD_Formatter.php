<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;


/**
 * Moldavsko
 */
class MD_Formatter implements CountryPostcodeFormatter
{
    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {
        if (str_starts_with($postcode, 'MD')) {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return 'MD-' . $postcode;
    }
}
