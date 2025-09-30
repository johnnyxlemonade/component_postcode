<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Cyprus
 */
final class CY_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^[0-9]+$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        $length = strlen($postcode);

        if ($length === 4) {
            return $postcode;
        }

        if ($length !== 5) {
            throw new InvalidPostcodeException($postcode);
        }

        if (!str_starts_with($postcode, '99')) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
