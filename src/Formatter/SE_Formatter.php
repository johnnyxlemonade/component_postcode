<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

use function substr_replace;

/**
 * Sweden
 */
final class SE_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches($postcode, '/^[0-9]{5}$/');

        if ($postcode < '10000' || $postcode > '98499') {
            throw new InvalidPostcodeException($postcode);
        }

        return substr_replace($postcode, ' ', 3, 0);
    }
}
