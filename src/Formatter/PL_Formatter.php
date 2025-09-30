<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Poland
 */
final class PL_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^[0-9]{5}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        return substr($postcode, 0, 2) . '-' . substr($postcode, 2);
    }
}
