<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Albania
 */
final class AL_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^[0-9]{4}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
