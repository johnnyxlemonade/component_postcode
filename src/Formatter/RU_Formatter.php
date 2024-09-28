<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Rusko
 */
class RU_Formatter implements CountryPostcodeFormatter
{
    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{6}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
