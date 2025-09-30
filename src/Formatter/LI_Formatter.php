<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Liechtenstein
 */
final class LI_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^[0-9]{4}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        if ($postcode < '9485' || $postcode > '9498') {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
