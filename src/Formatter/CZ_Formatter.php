<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

use function substr;

/**
 * Czech Republic
 */
final class CZ_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches($postcode, '/^[0-9]{5}$/');

        $district = $postcode[0];

        if ($district < '1' || $district > '7') {
            throw new InvalidPostcodeException($postcode);
        }

        return substr($postcode, 0, 3) . ' ' . substr($postcode, 3);
    }
}
