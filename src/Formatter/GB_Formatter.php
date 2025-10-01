<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter;

use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Formatter\Trait\PostcodeValidationTrait;

use function preg_match;
use function in_array;

/**
 * United Kingdom, Northern Ireland
 */
final class GB_Formatter implements CountryPostcodeFormatter
{
    /**
     * The list of valid area codes.
     */
    private const AREA_CODES = [
        'AB', 'AL', 'B', 'BA', 'BB', 'BD', 'BH', 'BL', 'BN', 'BR', 'BS', 'BT', 'CA', 'CB', 'CF', 'CH', 'CM', 'CO', 'CR',
        'CT', 'CV', 'CW', 'DA', 'DD', 'DE', 'DG', 'DH', 'DL', 'DN', 'DT', 'DY', 'E', 'EC', 'EH', 'EN', 'EX', 'FK', 'FY',
        'G', 'GL', 'GU', 'HA', 'HD', 'HG', 'HP', 'HR', 'HS', 'HU', 'HX', 'IG', 'IP', 'IV', 'KA', 'KT', 'KW', 'KY', 'L',
        'LA', 'LD', 'LE', 'LL', 'LN', 'LS', 'LU', 'M', 'ME', 'MK', 'ML', 'N', 'NE', 'NG', 'NN', 'NP', 'NR', 'NW', 'OL',
        'OX', 'PA', 'PE', 'PH', 'PL', 'PO', 'PR', 'RG', 'RH', 'RM', 'S', 'SA', 'SE', 'SG', 'SK', 'SL', 'SM', 'SN', 'SO',
        'SP', 'SR', 'SS', 'ST', 'SW', 'SY', 'TA', 'TD', 'TF', 'TN', 'TQ', 'TR', 'TS', 'TW', 'UB', 'W', 'WA', 'WC', 'WD',
        'WF', 'WN', 'WR', 'WS', 'WV', 'YO', 'ZE',

        // non-geographic
        'BF', 'BX', 'XX'
    ];


    public function format(string $postcode): string
    {
        if ($postcode === 'GIR0AA') {
            return 'GIR 0AA';
        }

        foreach ($this->getPatterns() as $pattern) {
            if (preg_match($pattern, $postcode, $matches) === 1) {
                [, $outwardCode, $areaCode, $inwardCode] = $matches;

                $this->assertValidAreaCode($areaCode, $postcode);

                return $outwardCode . ' ' . $inwardCode;
            }
        }

        throw new InvalidPostcodeException($postcode);
    }

    /**
     * @return list<string>
     */
    public static function getAreaCodes(): array
    {
        return self::AREA_CODES;
    }

    public function assertValidAreaCode(string $areaCode, string $postcode): void
    {
        if (!in_array($areaCode, self::AREA_CODES, true)) {
            throw new InvalidPostcodeException($postcode);
        }
    }

    /**
     * @return string[]
     */
    public function getPatterns(): array
    {

        $n = '[0-9]';

        // outward code alpha chars
        $alphaOut1 = '[ABCDEFGHIJKLMNOPRSTUWYZ]';
        $alphaOut2 = '[ABCDEFGHKLMNOPQRSTUVWXY]';
        $alphaOut3 = '[ABCDEFGHJKPSTUW]';
        $alphaOut4 = '[ABEHMNPRVWXY]';

        // inward code alpha chars
        $alphaIn = '[ABCDEFGHJLNPQRSTUWXYZ]';

        $outPatterns = [];

        // AN
        $outPatterns[] = '(' . $alphaOut1 . ')' . $n;

        // ANA
        $outPatterns[] = '(' . $alphaOut1 . ')' . $n . $alphaOut3;

        // ANN
        $outPatterns[] = '(' . $alphaOut1 . ')' . $n . $n;

        // AAN
        $outPatterns[] = '(' . $alphaOut1 . $alphaOut2 . ')' . $n;

        // AANA
        $outPatterns[] = '(' . $alphaOut1 . $alphaOut2 . ')' . $n . $alphaOut4;

        // AANN
        $outPatterns[] = '(' . $alphaOut1 . $alphaOut2 . ')' . $n . $n;

        $inPattern = $n . $alphaIn . $alphaIn;

        $patterns = [];

        foreach ($outPatterns as $outPattern) {
            $patterns[] = '/^(' . $outPattern . ')(' . $inPattern . ')$/';
        }

        return $patterns;
    }


}
