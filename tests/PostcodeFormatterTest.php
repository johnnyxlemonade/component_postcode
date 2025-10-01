<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\PostcodeFormatter;
use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Exception\UnknownCountryException;
use Lemonade\Postcode\Formatter\CZ_Formatter;
use Lemonade\Postcode\Formatter\SK_Formatter;
use PHPUnit\Framework\TestCase;

class PostcodeFormatterTest extends TestCase
{
    private PostcodeFormatter $formatter;

    protected function setUp(): void
    {
        $registry = new \Lemonade\Postcode\FormatterRegistry([
            'CZ' => new CZ_Formatter(),
            'SK' => new SK_Formatter(),
        ]);
        $this->formatter = new PostcodeFormatter($registry);
    }

    public function testFormatCzechPostcode(): void
    {
        $postcode = '12000';
        $formattedPostcode = $this->formatter->format('CZ', $postcode);

        $this->assertEquals('120 00', $formattedPostcode);
    }

    public function testFormatSlovakPostcode(): void
    {
        $postcode = '81101';
        $formattedPostcode = $this->formatter->format('SK', $postcode);

        $this->assertEquals('811 01', $formattedPostcode);
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
}
