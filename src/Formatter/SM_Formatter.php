<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * San Marino
 */
final class SM_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^[0-9]{5}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        if (!str_starts_with($postcode, '4789')) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
