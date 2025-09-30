<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Sweden
 */
final class SE_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^[0-9]{5}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        if ($postcode < '10000' || $postcode > '98499') {
            throw new InvalidPostcodeException($postcode);
        }

        return substr_replace($postcode, ' ', 3, 0);
    }
}
