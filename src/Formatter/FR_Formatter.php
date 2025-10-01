<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

/**
 * France
 */
final class FR_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches($postcode, '/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/');
        return $postcode;
    }
}
