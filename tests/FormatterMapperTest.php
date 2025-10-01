<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\FormatterMapper;
use Lemonade\Postcode\CountryPostcodeFormatter;
use PHPUnit\Framework\TestCase;

final class FormatterMapperTest extends TestCase
{
    public function testAllReturnsArrayOfFormatters(): void
    {
        $map = FormatterMapper::all();

        $this->assertIsArray($map);
        $this->assertNotEmpty($map);

        foreach ($map as $code => $formatter) {
            $this->assertIsString($code);
            $this->assertInstanceOf(CountryPostcodeFormatter::class, $formatter);
        }
    }

    public function testAllContainsCzFormatter(): void
    {
        $map = FormatterMapper::all();

        $this->assertArrayHasKey('CZ', $map);
        $this->assertInstanceOf(CountryPostcodeFormatter::class, $map['CZ']);
    }
}
