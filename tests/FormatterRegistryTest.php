<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\CountryCode;
use Lemonade\Postcode\CountryPostcodeFormatter;
use Lemonade\Postcode\Exception\UnsupportedCountryException;
use Lemonade\Postcode\FormatterRegistry;
use PHPUnit\Framework\TestCase;

final class FormatterRegistryTest extends TestCase
{
    private FormatterRegistry $registry;

    protected function setUp(): void
    {
        $this->registry = new FormatterRegistry();
    }

    public function testDefaultCzFormatterIsLoaded(): void
    {
        $formatter = $this->registry->getFormatter(CountryCode::CZ);

        $this->assertInstanceOf(CountryPostcodeFormatter::class, $formatter);
        $this->assertSame('120 00', $formatter->format('12000'));
    }

    public function testRegisterReturnsNewRegistryWithCustomFormatter(): void
    {
        $custom = new class implements CountryPostcodeFormatter {
            public function format(string $postcode): string
            {
                return 'CUSTOM-' . $postcode;
            }
        };

        $newRegistry = $this->registry->register(CountryCode::CZ, $custom);

        // původní registry zůstává beze změny
        $defaultFormatter = $this->registry->getFormatter(CountryCode::CZ);
        $this->assertSame('120 00', $defaultFormatter->format('12000'));

        // nová registry obsahuje custom formatter
        $customFormatter = $newRegistry->getFormatter(CountryCode::CZ);
        $this->assertSame('CUSTOM-12345', $customFormatter->format('12345'));
    }

    public function testUnsupportedCountryThrowsException(): void
    {
        $this->expectException(UnsupportedCountryException::class);

        $this->registry->getFormatter(CountryCode::AQ);
    }

    public function testHasAndAllMethods(): void
    {
        $this->assertTrue($this->registry->has(CountryCode::CZ));
        $this->assertFalse($this->registry->has(CountryCode::AQ));

        $all = $this->registry->all();
        $this->assertIsArray($all);
        $this->assertArrayHasKey('CZ', $all);
    }
}
