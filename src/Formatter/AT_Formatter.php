<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Austria
 */
final class AT_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^[1-9][0-9]{3}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
