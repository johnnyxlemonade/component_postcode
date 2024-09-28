<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Recko
 */
class GR_Formatter implements CountryPostcodeFormatter
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

        return substr($postcode, 0, 3) . ' ' . substr($postcode, 3);
    }
}
