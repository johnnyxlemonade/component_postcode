<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

use function str_starts_with;
use function strlen;
use function substr;

/**
 * Lithuania
 */
final class LT_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        if (str_starts_with($postcode, 'LT') && strlen($postcode) === 7) {
            $numeric = substr($postcode, 2);
            $this->assertMatches($numeric, '/^[0-9]{5}$/');
            return 'LT-' . $numeric;
        }

        $this->assertMatches($postcode, '/^[0-9]{5}$/');

        return $postcode;
    }
}
