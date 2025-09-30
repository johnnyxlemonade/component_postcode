<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;
use Lemonade\Postcode\CountryPostcodeFormatter;

/**
 * Andorra
 */
class AD_Formatter implements CountryPostcodeFormatter
{

    /**
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode) : ?string
    {
        if (substr($postcode, 0, 2) === 'AD') {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{3}$/', $postcode) !== 1) {
            return null;
        }

        return 'AD' . $postcode;
    }
}
