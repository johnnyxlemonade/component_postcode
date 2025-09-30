<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Portugalsko
 */
class PT_Formatter implements CountryPostcodeFormatter
{
    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{7}$/', $postcode) !== 1) {
            return null;
        }

        return substr($postcode, 0, 4) . '-' . substr($postcode, 4);
    }
}
