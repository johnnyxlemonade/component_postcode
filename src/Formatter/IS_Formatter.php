<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Iceland
 */
final class IS_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (!preg_match('/^[0-9]{3}$/', $postcode)) {
            throw new InvalidPostcodeException($postcode);
        }

        if ($postcode[0] === '0') {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
