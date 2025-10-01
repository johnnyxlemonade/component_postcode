<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

use function in_array;
use function substr;

/**
 * Slovakia
 */
final class SK_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches($postcode, '/^[0-9]{5}$/');

        $district = $postcode[0];

        if (!in_array($district, ['8', '9', '0'], true)) {
            throw new InvalidPostcodeException($postcode);
        }

        return substr($postcode, 0, 3) . ' ' . substr($postcode, 3);
    }
}
