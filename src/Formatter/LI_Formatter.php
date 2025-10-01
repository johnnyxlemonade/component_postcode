<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

/**
 * Liechtenstein
 */
final class LI_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches($postcode, '/^[0-9]{4}$/');

        if ($postcode < '9485' || $postcode > '9498') {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
