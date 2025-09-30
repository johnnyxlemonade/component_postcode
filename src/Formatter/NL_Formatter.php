<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Nizozemi (holansko)
 */
class NL_Formatter implements CountryPostcodeFormatter
{
    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^([0-9]{4})([A-Z]{2})$/', $postcode, $matches) !== 1) {
            return null;
        }

        if (in_array($matches[2], ['SS', 'SD', 'SA'], true)) {
            return null;
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
