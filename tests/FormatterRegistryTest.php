<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\FormatterRegistry;
use Lemonade\Postcode\Formatter\CZ_Formatter;
use Lemonade\Postcode\Formatter\SK_Formatter;
use Lemonade\Postcode\Exception\UnknownCountryException;
use PHPUnit\Framework\TestCase;

class FormatterRegistryTest extends TestCase
{
    private FormatterRegistry $registry;

    protected function setUp(): void
    {
        $this->registry = new FormatterRegistry([
            'CZ' => new CZ_Formatter(),
            'SK' => new SK_Formatter(),
        ]);
    }

    public function testAddFormatter(): void
    {
        // Adding new formatter using withAdded()
        $newRegistry = $this->registry->withAdded('DE', new \Lemonade\Postcode\Formatter\DE_Formatter());

        $this->assertTrue($newRegistry->has('DE'));
        $formatter = $newRegistry->get('DE');
        $this->assertInstanceOf(\Lemonade\Postcode\Formatter\DE_Formatter::class, $formatter);
    }

    public function testGetFormatterForExistingCountry(): void
    {
        $formatter = $this->registry->get('CZ');
        $this->assertInstanceOf(CZ_Formatter::class, $formatter);
    }

    public function testGetFormatterForUnknownCountry(): void
    {
        $this->expectException(UnknownCountryException::class);
        $this->expectExceptionMessage('error.unknown_country');

        $this->registry->get('XX');
    }

    public function testHasFormatterForExistingCountry(): void
    {
        $this->assertTrue($this->registry->has('CZ'));
    }

    public function testHasFormatterForUnknownCountry(): void
    {
        $this->assertFalse($this->registry->has('XX'));
    }

    public function testListCountries(): void
    {
        $countries = $this->registry->listCountries();
        $this->assertContains('CZ', $countries);
        $this->assertContains('SK', $countries);
        $this->assertCount(2, $countries);
    }

    public function testWithAddedFormatterDoesNotModifyOriginalRegistry(): void
    {
        $newRegistry = $this->registry->withAdded('DE', new \Lemonade\Postcode\Formatter\DE_Formatter());

        // The original registry should still have only CZ and SK formatters
        $this->assertTrue($this->registry->has('CZ'));
        $this->assertTrue($this->registry->has('SK'));
        $this->assertFalse($this->registry->has('DE'));

        // The new registry should have CZ, SK, and DE formatters
        $this->assertTrue($newRegistry->has('DE'));
        $this->assertTrue($newRegistry->has('CZ'));
        $this->assertTrue($newRegistry->has('SK'));
    }

    public function testNormalizeCode(): void
    {
        $method = new \ReflectionMethod(FormatterRegistry::class, 'normalizeCode');
        $method->setAccessible(true);

        $this->assertEquals('CZ', $method->invoke($this->registry, 'cz'));
        $this->assertEquals('SK', $method->invoke($this->registry, 'Sk'));
        $this->assertEquals('SK', $method->invoke($this->registry, 'SK'));
    }

    public function testExceptionThrownWhenAccessingUnknownCountry(): void
    {
        $this->expectException(UnknownCountryException::class);
        $this->registry->get('XX'); // XX is not a valid country code
    }

    public function testWithAddedCanOverwriteExistingFormatter(): void
    {
        // The original registry has CZ_Formatter
        $this->assertInstanceOf(CZ_Formatter::class, $this->registry->get('CZ'));

        // Overwrite the CZ code with a new SK_Formatter instance
        $newRegistry = $this->registry->withAdded('CZ', new SK_Formatter());

        // 1. Verify that the new registry has the overwritten formatter
        $this->assertInstanceOf(SK_Formatter::class, $newRegistry->get('CZ'));
        $this->assertNotInstanceOf(CZ_Formatter::class, $newRegistry->get('CZ'));

        // 2. Verify that the original registry remains unchanged
        $this->assertInstanceOf(CZ_Formatter::class, $this->registry->get('CZ'));
    }

}
