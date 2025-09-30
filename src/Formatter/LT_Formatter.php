<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Lithuania
 */
final class LT_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (str_starts_with($postcode, 'LT') && strlen($postcode) === 7) {
            $numeric = substr($postcode, 2);
            if (!preg_match('/^[0-9]{5}$/', $numeric)) {
                throw new InvalidPostcodeException($postcode);
            }
            return 'LT-' . $numeric;
        }

        if (!preg_match('/^[0-9]{5}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
