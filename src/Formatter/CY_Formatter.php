<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

use function str_starts_with;
use function strlen;

/**
 * Cyprus
 */
final class CY_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches($postcode, '/^[0-9]+$/');

        $length = strlen($postcode);

        if ($length === 4) {
            return $postcode;
        }

        if ($length !== 5) {
            throw new InvalidPostcodeException($postcode);
        }

        if (!str_starts_with($postcode, '99')) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
