<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

use function str_starts_with;

/**
 * Monaco
 */
final class MC_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        $this->assertMatches($postcode, '/^[0-9]{5}$/');

        if (!str_starts_with($postcode, '980')) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
