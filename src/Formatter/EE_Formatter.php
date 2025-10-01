<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

/**
 * Estonia
 */
final class EE_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches($postcode, '/^[0-9]{5}$/');
        return $postcode;
    }
}
