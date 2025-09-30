<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Lichtenstensjko
 */
class LI_Formatter implements CountryPostcodeFormatter
{

    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode < '9485' || $postcode > '9498') {
            return null;
        }

        return $postcode;
    }
}
