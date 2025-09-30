<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Slovakia
 */
final class SK_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^[0-9]{5}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        $district = $postcode[0];

        if (!in_array($district, ['8', '9', '0'], true)) {
            throw new InvalidPostcodeException($postcode);
        }

        return substr($postcode, 0, 3) . ' ' . substr($postcode, 3);
    }
}
