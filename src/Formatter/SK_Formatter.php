<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Slovensko
 */
class SK_Formatter implements CountryPostcodeFormatter
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

        $district = $postcode[0];

        if (! in_array($district, ['8', '9', '0'], true)) {
            return null;
        }

        return substr($postcode, 0, 3) . ' ' . substr($postcode, 3);
    }
}
