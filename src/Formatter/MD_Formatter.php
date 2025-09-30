<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Moldova
 */
final class MD_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (str_starts_with($postcode, 'MD')) {
            $postcode = substr($postcode, 2);
        }

        if (!preg_match('/^[0-9]{4}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        return 'MD-' . $postcode;
    }
}
