<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Litva
 */
class LT_Formatter implements CountryPostcodeFormatter
{
    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {
        $length = strlen($postcode);
        $prefix = false;

        if ($length === 7) {

            if (!str_starts_with($postcode, 'LT')) {
                return null;
            }

            $postcode = substr($postcode, 2);
            $prefix = true;

        } elseif (strlen($postcode) !== 5) {
            return null;
        }

        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        if ($prefix) {
            return 'LT-' . $postcode;
        }

        return $postcode;
    }
}
