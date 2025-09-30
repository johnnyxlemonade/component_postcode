<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Vatican
 */
final class VA_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if ($postcode === '00120') {
            return $postcode;
        }

        throw new InvalidPostcodeException($postcode);
    }
}
