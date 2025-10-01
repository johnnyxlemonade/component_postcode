<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\Exception\InvalidPostcodeException;
use PHPUnit\Framework\TestCase;

/**
 * FormatterCoverageTest
 *
 * Special test class to ensure coverage for all CountryPostcodeFormatter implementations.
 * Each formatter should have at least one valid and one invalid test case.
 */
final class FormatterCoverageTest extends TestCase
{
    public function testInvalidCzechPostcodeThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);

        $formatter = new \Lemonade\Postcode\Formatter\CZ_Formatter();
        $formatter->format('89000');
    }

    public function testInvalidSlovakPostcodeThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);

        $formatter = new \Lemonade\Postcode\Formatter\SK_Formatter();
        $formatter->format('51101');
    }

    public function testValidAndorranPostcodeIsFormatted(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\AD_Formatter();

        $this->assertSame('AD500', $formatter->format('500'));
        $this->assertSame('AD501', $formatter->format('AD501'));
    }

    public function testInvalidAndorranPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);

        $formatter = new \Lemonade\Postcode\Formatter\AD_Formatter();
        $formatter->format('50');
    }

    public function testValidAlbanianPostcodeIsFormatted(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\AL_Formatter();
        $this->assertSame('1001', $formatter->format('1001'));
    }

    public function testInvalidAlbanianPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\AL_Formatter();
        $formatter->format('101');
    }

    public function testValidAustrianPostcodeIsFormatted(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\AT_Formatter();
        $this->assertSame('1010', $formatter->format('1010'));
    }

    public function testInvalidAustrianPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\AT_Formatter();
        $formatter->format('0123');
    }

    public function testValidBosniaPostcodeIsFormatted(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\BA_Formatter();
        $this->assertSame('71000', $formatter->format('71000'));
    }

    public function testInvalidBosniaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\BA_Formatter();
        $formatter->format('7100');
    }

    public function testValidBelgiumPostcodeIsFormatted(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\BE_Formatter();
        $this->assertSame('1000', $formatter->format('1000'));
    }

    public function testInvalidBelgiumPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\BE_Formatter();
        $formatter->format('100');
    }
    public function testValidBulgariaPostcodeIsFormatted(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\BG_Formatter();
        $this->assertSame('1000', $formatter->format('1000'));
    }

    public function testInvalidBulgariaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\BG_Formatter();
        $formatter->format('100');
    }
    public function testValidBelarusPostcodeIsFormatted(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\BY_Formatter();
        $this->assertSame('220050', $formatter->format('220050'));
    }

    public function testInvalidBelarusPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\BY_Formatter();
        $formatter->format('22005');
    }

    public function testValidSwissPostcodeIsFormatted(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\CH_Formatter();
        $this->assertSame('8000', $formatter->format('8000'));
    }

    public function testInvalidSwissPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\CH_Formatter();
        $formatter->format('0123');
    }

    public function testValidCyprusPostcodeFourDigits(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\CY_Formatter();
        $this->assertSame('1234', $formatter->format('1234'));
    }

    public function testValidCyprusPostcodeFiveDigitsStartingWith99(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\CY_Formatter();
        $this->assertSame('99123', $formatter->format('99123'));
    }

    public function testInvalidCyprusPostcodeWrongLength(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\CY_Formatter();
        $formatter->format('123');
    }

    public function testInvalidCyprusPostcodeFiveDigitsNotStartingWith99(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\CY_Formatter();
        $formatter->format('12345');
    }

    public function testValidGermanPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\DE_Formatter();
        $this->assertSame('10115', $formatter->format('10115'));
    }

    public function testInvalidGermanPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\DE_Formatter();
        $formatter->format('00000');
    }

    public function testValidDanishPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\DK_Formatter();
        $this->assertSame('2100', $formatter->format('2100'));
    }

    public function testInvalidDanishPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\DK_Formatter();
        $formatter->format('21000');
    }

    public function testValidEstonianPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\EE_Formatter();
        $this->assertSame('12345', $formatter->format('12345'));
    }

    public function testInvalidEstonianPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\EE_Formatter();
        $formatter->format('1234');
    }

    public function testValidSpanishPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\ES_Formatter();
        $this->assertSame('28001', $formatter->format('28001'));
    }

    public function testInvalidSpanishPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\ES_Formatter();
        $formatter->format('2800');
    }

    public function testValidFinnishPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\FI_Formatter();
        $this->assertSame('00100', $formatter->format('00100'));
    }

    public function testInvalidFinnishPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\FI_Formatter();
        $formatter->format('100');
    }

    public function testValidFrenchPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\FR_Formatter();
        $this->assertSame('75001', $formatter->format('75001'));
    }

    public function testInvalidFrenchPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\FR_Formatter();
        $formatter->format('99000');
    }

    public function testValidGreekPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\GR_Formatter();
        $this->assertSame('123 45', $formatter->format('12345'));
    }

    public function testInvalidGreekPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\GR_Formatter();
        $formatter->format('12A45');
    }

    public function testValidCroatianPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\HR_Formatter();
        $this->assertSame('10000', $formatter->format('10000'));
    }

    public function testInvalidCroatianPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\HR_Formatter();
        $formatter->format('1000A');
    }

    public function testValidHungarianPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\HU_Formatter();
        $this->assertSame('1234', $formatter->format('1234'));
    }

    public function testInvalidHungarianPostcodeStartingWithZeroThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\HU_Formatter();
        $formatter->format('0123');
    }

    public function testInvalidHungarianPostcodeFormatThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\HU_Formatter();
        $formatter->format('12345');
    }

    public function testValidIcelandicPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\IS_Formatter();
        $this->assertSame('101', $formatter->format('101'));
    }

    public function testInvalidIcelandicPostcodeStartingWithZeroThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\IS_Formatter();
        $formatter->format('012');
    }

    public function testInvalidIcelandicPostcodeFormatThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\IS_Formatter();
        $formatter->format('1234');
    }

    public function testValidItalianPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\IT_Formatter();
        $this->assertSame('00184', $formatter->format('00184'));
    }

    public function testInvalidItalianPostcodeTooShortThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\IT_Formatter();
        $formatter->format('1234');
    }

    public function testInvalidItalianPostcodeWithLettersThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\IT_Formatter();
        $formatter->format('12A45');
    }

    public function testValidLiechtensteinPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\LI_Formatter();
        $this->assertSame('9485', $formatter->format('9485'));
        $this->assertSame('9498', $formatter->format('9498'));
    }

    public function testInvalidLiechtensteinPostcodeBelowRangeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\LI_Formatter();
        $formatter->format('9484');
    }

    public function testInvalidLiechtensteinPostcodeAboveRangeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\LI_Formatter();
        $formatter->format('9499');
    }

    public function testValidLithuaniaPostcodeWithoutPrefix(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\LT_Formatter();
        $this->assertSame('12345', $formatter->format('12345'));
    }

    public function testValidLithuaniaPostcodeWithPrefix(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\LT_Formatter();
        $this->assertSame('LT-12345', $formatter->format('LT12345'));
    }

    public function testInvalidLithuaniaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\LT_Formatter();
        $formatter->format('12A45');
    }

    public function testInvalidLithuaniaPrefixedPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\LT_Formatter();
        $formatter->format('LT12A45');
    }

    public function testValidLuxembourgPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\LU_Formatter();
        $this->assertSame('1234', $formatter->format('1234'));
    }

    public function testInvalidLuxembourgPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\LU_Formatter();
        $formatter->format('12A4');
    }

    public function testValidLatviaPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\LV_Formatter();
        $this->assertSame('LV-1050', $formatter->format('1050'));
        $this->assertSame('LV-2000', $formatter->format('LV2000'));
    }

    public function testInvalidLatviaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\LV_Formatter();
        $formatter->format('ABCDE');
    }

    public function testValidMonacoPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\MC_Formatter();
        $this->assertSame('98000', $formatter->format('98000'));
        $this->assertSame('98012', $formatter->format('98012'));
    }

    public function testInvalidMonacoPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\MC_Formatter();
        $formatter->format('75001');
    }

    public function testValidMoldovaPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\MD_Formatter();
        $this->assertSame('MD-2000', $formatter->format('2000'));
        $this->assertSame('MD-2012', $formatter->format('MD2012'));
    }

    public function testInvalidMoldovaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\MD_Formatter();
        $formatter->format('20A0');
    }

    public function testValidMontenegroPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\ME_Formatter();
        $this->assertSame('81000', $formatter->format('81000'));
    }

    public function testInvalidMontenegroPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\ME_Formatter();
        $formatter->format('81A00');
    }

    public function testValidMacedoniaPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\MK_Formatter();
        $this->assertSame('1000', $formatter->format('1000'));
    }

    public function testInvalidMacedoniaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\MK_Formatter();
        $formatter->format('10A0');
    }

    public function testValidMaltaPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\MT_Formatter();
        $this->assertSame('ABC 1234', $formatter->format('ABC1234'));
    }

    public function testInvalidMaltaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\MT_Formatter();
        $formatter->format('AB1234');
    }

    public function testValidNetherlandsPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\NL_Formatter();
        $this->assertSame('1234 AB', $formatter->format('1234AB'));
    }

    public function testInvalidNetherlandsPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\NL_Formatter();
        $formatter->format('123AB');
    }

    public function testInvalidNetherlandsPostcodeForbiddenCombinations(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\NL_Formatter();
        $formatter->format('1234SS');
    }

    public function testValidNorwayPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\NO_Formatter();
        $this->assertSame('1234', $formatter->format('1234'));
    }

    public function testInvalidNorwayPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\NO_Formatter();
        $formatter->format('12A4');
    }

    public function testValidPolandPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\PL_Formatter();
        $this->assertSame('12-345', $formatter->format('12345'));
    }

    public function testInvalidPolandPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\PL_Formatter();
        $formatter->format('12A45');
    }

    public function testValidPortugalPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\PT_Formatter();
        $this->assertSame('1234-567', $formatter->format('1234567'));
    }

    public function testInvalidPortugalPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\PT_Formatter();
        $formatter->format('12-345');
    }

    public function testValidRomaniaPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\RO_Formatter();
        $this->assertSame('010001', $formatter->format('010001'));
    }

    public function testInvalidRomaniaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\RO_Formatter();
        $formatter->format('990001');
    }

    public function testValidSerbiaPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\RS_Formatter();
        $this->assertSame('11000', $formatter->format('11000'));
    }

    public function testInvalidSerbiaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\RS_Formatter();
        $formatter->format('ABCDE');
    }

    public function testValidRussiaPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\RU_Formatter();
        $this->assertSame('123456', $formatter->format('123456'));
    }

    public function testInvalidRussiaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\RU_Formatter();
        $formatter->format('12345A');
    }

    public function testValidSwedenPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\SE_Formatter();
        $this->assertSame('123 45', $formatter->format('12345'));
    }

    public function testInvalidSwedenPostcodeOutOfRangeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\SE_Formatter();
        $formatter->format('99999');
    }

    public function testInvalidSwedenPostcodeNonNumericThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\SE_Formatter();
        $formatter->format('12A45');
    }

    public function testValidSloveniaPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\SI_Formatter();
        $this->assertSame('1000', $formatter->format('1000'));
    }

    public function testInvalidSloveniaPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\SI_Formatter();
        $formatter->format('ABCDE');
    }

    public function testValidSanMarinoPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\SM_Formatter();
        $this->assertSame('47890', $formatter->format('47890'));
    }

    public function testInvalidSanMarinoPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\SM_Formatter();
        $formatter->format('12345');
    }

    public function testValidUkrainePostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\UA_Formatter();
        $this->assertSame('65000', $formatter->format('65000'));
    }

    public function testInvalidUkrainePostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\UA_Formatter();
        $formatter->format('ABCDE');
    }

    public function testValidVaticanPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\VA_Formatter();
        $this->assertSame('00120', $formatter->format('00120'));
    }

    public function testInvalidVaticanPostcodeThrowsException(): void
    {
        $this->expectException(\Lemonade\Postcode\Exception\InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\VA_Formatter();
        $formatter->format('00121');
    }

    public function testValidUkPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\GB_Formatter();
        $this->assertSame('EC1A 1BB', $formatter->format('EC1A1BB'));
    }

    public function testSpecialCaseUkPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\GB_Formatter();
        $this->assertSame('GIR 0AA', $formatter->format('GIR0AA'));
    }

    public function testInvalidUkPostcodeThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\GB_Formatter();
        $formatter->format('ZZ99ZZ');
    }

    public function testGetPatternsReturnsValidRegexArray(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\GB_Formatter();
        $patterns = $formatter->getPatterns();

        $this->assertIsArray($patterns);
        $this->assertNotEmpty($patterns);

        foreach ($patterns as $pattern) {
            $this->assertIsString($pattern);
            $this->assertStringStartsWith('/', $pattern);
            $this->assertStringEndsWith('/', $pattern);
        }
    }

    public function testValidFormatButInvalidAreaCodeThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);

        $formatter = new \Lemonade\Postcode\Formatter\GB_Formatter();
        $formatter->assertValidAreaCode('ZZ', 'ZZ1A1AA');
    }

    public function testGetAreaCodesDirectly(): void
    {
        $codes = \Lemonade\Postcode\Formatter\GB_Formatter::getAreaCodes();

        $this->assertIsArray($codes);
        $this->assertContains('EC', $codes);
        $this->assertContains('ZE', $codes);
        $this->assertNotContains('ZZ', $codes);
    }

    public function testValidIrishPostcode(): void
    {
        $formatter = new \Lemonade\Postcode\Formatter\IE_Formatter();
        $this->assertSame('D02 X285', $formatter->format('D02X285'));
        $this->assertSame('A94 F4E8', $formatter->format('A94F4E8'));
    }

    public function testInvalidIrishPostcodeThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\IE_Formatter();
        $formatter->format('INVALID');
    }

    public function testWrongAreaIrishPostcodeThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);
        $formatter = new \Lemonade\Postcode\Formatter\IE_Formatter();
        $formatter->format('ZZ1X285');
    }

}
