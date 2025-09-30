<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Netherlands
 */
final class NL_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^([0-9]{4})([A-Z]{2})$/', $postcode, $matches)) {
            throw new InvalidPostcodeException($postcode);
        }

        if (in_array($matches[2], ['SS', 'SD', 'SA'], true)) {
            throw new InvalidPostcodeException($postcode);
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
