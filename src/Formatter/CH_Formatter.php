<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

/**
 * Switzerland
 */
final class CH_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches($postcode, '/^[1-9][0-9]{3}$/');
        return $postcode;
    }
}
