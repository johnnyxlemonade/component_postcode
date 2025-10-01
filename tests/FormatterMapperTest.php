<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\FormatterRegistry;
use Lemonade\Postcode\FormatterMapper;
use Lemonade\Postcode\Formatter\CZ_Formatter;
use Lemonade\Postcode\Formatter\SK_Formatter;
use Lemonade\Postcode\Exception\UnknownCountryException;
use PHPUnit\Framework\TestCase;

class FormatterMapperTest extends TestCase
{
    private FormatterRegistry $registry;

    protected function setUp(): void
    {
        $this->registry = new FormatterRegistry([
            'CZ' => new CZ_Formatter(),
            'SK' => new SK_Formatter(),
        ]);
    }

    public function testAddingFormatter(): void
    {
        $newFormatter = new SK_Formatter(); // New instance of SK_Formatter
        $newRegistry = $this->registry->withAdded('PL', $newFormatter);

        // Assert that new registry contains 'PL' country code
        $this->assertTrue($newRegistry->has('PL'));
        $this->assertInstanceOf(SK_Formatter::class, $newRegistry->get('PL'));
    }

    public function testGetFormatterForExistingCountry(): void
    {
        $formatter = $this->registry->get('CZ');
        $this->assertInstanceOf(CZ_Formatter::class, $formatter);
    }

    public function testGetFormatterForUnknownCountry(): void
    {
        $this->expectException(UnknownCountryException::class);
        $this->registry->get('XX');
    }

    public function testListCountries(): void
    {
        $countries = $this->registry->listCountries();
        $this->assertContains('CZ', $countries);
        $this->assertContains('SK', $countries);
    }
}
