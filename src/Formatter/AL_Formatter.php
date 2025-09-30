<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Albanie
 */
class AL_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
