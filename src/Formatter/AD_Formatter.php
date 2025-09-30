<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Andorra
 */
final class AD_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (str_starts_with($postcode, 'AD')) {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{3}$/', $postcode) !== 1) {
            throw new InvalidPostcodeException($postcode);
        }

        return 'AD' . $postcode;
    }
}
