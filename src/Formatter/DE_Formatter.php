<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

/**
 * Germany
 */
final class DE_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches(
            $postcode,
            '/^((?:0[1-46-9]\d{3})|(?:[1-357-9]\d{4})|(?:4[0-24-9]\d{3})|(?:6[013-9]\d{3}))$/'
        );

        return $postcode;
    }
}
