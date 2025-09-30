<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Malta
 */
final class MT_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^([A-Z]{3})([0-9]{4})$/', $postcode, $matches)) {
            throw new InvalidPostcodeException($postcode);
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
