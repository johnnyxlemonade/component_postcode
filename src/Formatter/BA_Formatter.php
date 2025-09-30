<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Bosnia and Herzegovina
 */
final class BA_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}

