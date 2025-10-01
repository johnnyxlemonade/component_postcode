<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\PostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Exception\UnknownCountryException;
use Lemonade\Postcode\Formatter\CZ_Formatter;
use Lemonade\Postcode\Formatter\SK_Formatter;
use Lemonade\Postcode\Formatter\DE_Formatter;
use PHPUnit\Framework\TestCase;

class PostcodeFormatterIntegrationTest extends TestCase
{
    private PostcodeFormatter $formatter;

    protected function setUp(): void
    {
        $registry = new \Lemonade\Postcode\FormatterRegistry([
            'CZ' => new CZ_Formatter(),
            'SK' => new SK_Formatter(),
            'DE' => new DE_Formatter(),
        ]);
        $this->formatter = new PostcodeFormatter($registry);
    }

    public function testFormatMultipleCountries(): void
    {
        // Czech Postcode
        $postcode = '12000';
        $formattedPostcode = $this->formatter->format('CZ', $postcode);
        $this->assertEquals('120 00', $formattedPostcode);

        // Slovak Postcode
        $postcode = '81101';
        $formattedPostcode = $this->formatter->format('SK', $postcode);
        $this->assertEquals('811 01', $formattedPostcode);

        // German Postcode (assuming you have DE_Formatter)
        $postcode = '10115';
        $formattedPostcode = $this->formatter->format('DE', $postcode);
        $this->assertEquals('10115', $formattedPostcode);
    }

    public function testInvalidPostcodeFormatThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);
        $this->formatter->format('CZ', 'invalid');
    }

    public function testUnknownCountryThrowsException(): void
    {
        $this->expectException(UnknownCountryException::class);
        $this->formatter->format('XX', '12345');
    }

    public function testInputNormalization(): void
    {
        // Test Czech Postcode with space and hyphen (they should be removed before validation)
        $formatted = $this->formatter->format('CZ', '120-00');
        $this->assertEquals('120 00', $formatted, 'It should normalize the hyphen to a space (and return it in the final format).');

        $formatted = $this->formatter->format('SK', '999 99');
        $this->assertEquals('999 99', $formatted, 'It should remove the space before validation and add it back for the output format.');

        $this->expectException(InvalidPostcodeException::class);
        $this->formatter->format('CZ', '1200A');
    }

    public function testInvalidPostcodeWithSpecialCharsThrowsException(): void
    {
        $this->expectException(InvalidPostcodeException::class);
        $this->formatter->format('CZ', '123$45');
    }
}
