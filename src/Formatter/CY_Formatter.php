<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Kypr
 */
class CY_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        $length = strlen($postcode);

        if ($length === 4) {
            return $postcode;
        }

        if (strlen($postcode) !== 5) {
            return null;
        }

        if (substr($postcode, 0, 2) !== '99') {
            return null;
        }

        return $postcode;
    }
}
