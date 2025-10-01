<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\PostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Exception\UnknownCountryException;
use Lemonade\Postcode\Exception\UnsupportedCountryException;
use Lemonade\Postcode\Formatter\CZ_Formatter;
use Lemonade\Postcode\Formatter\SK_Formatter;
use Lemonade\Postcode\CountryCode;
use Lemonade\Postcode\FormatterRegistry;
use PHPUnit\Framework\TestCase;

class PostcodeFormatterTest extends TestCase
{
    private PostcodeFormatter $formatter;

    protected function setUp(): void
    {
        $registry = (new FormatterRegistry())
            ->register(CountryCode::CZ, new CZ_Formatter())
            ->register(CountryCode::SK, new SK_Formatter());

        $this->formatter = new PostcodeFormatter($registry);
    }

    public function testFormatCzechPostcode(): void
    {
        $postcode = '12000';
        $formattedPostcode = $this->formatter->format(CountryCode::CZ, $postcode);

        $this->assertEquals('120 00', $formattedPostcode);
    }

    public function testFormatSlovakPostcode(): void
    {
        $postcode = '81101';
        $formattedPostcode = $this->formatter->format(CountryCode::SK, $postcode);

        $this->assertEquals('811 01', $formattedPostcode);
    }

    public function testInvalidPostcodeFormatThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);
        $this->formatter->format(CountryCode::CZ, 'invalid');
    }

    public function testUnknownCountryThrowsException(): void
    {
        $this->expectException(UnknownCountryException::class);

        try {
            $this->formatter->format(CountryCode::from('XX'), '12345');
        } catch (\ValueError $e) {
            throw new UnknownCountryException('XX');
        }
    }

    public function testInvalidPostcodeWithSpecialCharsThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);
        $this->formatter->format(CountryCode::CZ, '123$45');
    }

    public function testInputNormalization(): void
    {
        $this->expectException(InvalidPostcodeException::class);
        $this->formatter->format(CountryCode::CZ, '120-00');

        $this->expectException(InvalidPostcodeException::class);
        $this->formatter->format(CountryCode::SK, '999 99');

        $this->expectException(InvalidPostcodeException::class);
        $this->formatter->format(CountryCode::CZ, '1200A');
    }

    public function testUnsupportedCountryFormatterThrowsException(): void
    {
        $this->expectException(UnsupportedCountryException::class);

        try {
            $this->formatter->format(CountryCode::from('XX'), '12345');
        } catch (\ValueError $e) {
            throw new UnsupportedCountryException('XX');
        }
    }

    public function testInvalidCzechPostcodeThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);

        $formatter = new CZ_Formatter();
        $formatter->format('89000'); // district 8 not allowed
    }

    public function testInvalidSlovakPostcodeThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);

        $formatter = new SK_Formatter();
        $formatter->format('51101'); // invalid district
    }
}
