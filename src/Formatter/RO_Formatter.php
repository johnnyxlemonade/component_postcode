<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;

use function preg_match;

/**
 * Romania
 */
final class RO_Formatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): string
    {
        if (preg_match(
                '/^(01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|50|51|52|53|54|55|60|61|62|70|71|72|73|80|81|82|90|91|92)[0-9]{4}$/',
                $postcode
            ) !== 1) {
            throw new InvalidPostcodeException($postcode);
        }

        return $postcode;
    }
}
