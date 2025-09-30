<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * France
 */
final class FR_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
