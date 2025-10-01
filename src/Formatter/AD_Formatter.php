<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

use function str_starts_with;
use function substr;

/**
 * Andorra
 */
final class AD_Formatter implements CountryPostcodeFormatter
{
    use PostcodeValidationTrait;

    public function format(string $postcode): string
    {
        if (str_starts_with($postcode, 'AD')) {
            $postcode = substr($postcode, 2);
        }

        $this->assertMatches($postcode, '/^[0-9]{3}$/');

        return 'AD' . $postcode;
    }
}
