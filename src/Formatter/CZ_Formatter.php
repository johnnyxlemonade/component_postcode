<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Cesko
 */
class CZ_Formatter implements CountryPostcodeFormatter
{

    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        $district = $postcode[0];

        if ($district < '1' || $district > '7') {
            return null;
        }

        return substr($postcode, 0, 3) . ' ' . substr($postcode, 3);
    }
}
