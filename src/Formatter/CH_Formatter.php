<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Svycarsko
 */
class CH_Formatter implements CountryPostcodeFormatter
{

    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[1-9][0-9]{3}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
