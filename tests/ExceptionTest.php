<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\Exception\InvalidPostcodeException;
use Lemonade\Postcode\Exception\UnknownCountryException;
use Lemonade\Postcode\Exception\UnsupportedCountryException;
use PHPUnit\Framework\TestCase;

final class ExceptionTest extends TestCase
{
    public function testInvalidPostcodeExceptionGetValue(): void
    {
        $exception = new InvalidPostcodeException('123$45');

        $this->assertSame('123$45', $exception->getValue());
        $this->assertSame('error.invalid_postcode', $exception->getMessage());
    }

    public function testUnknownCountryExceptionGetValue(): void
    {
        $exception = new UnknownCountryException('XX');

        $this->assertSame('XX', $exception->getValue());
        $this->assertSame('error.unknown_country', $exception->getMessage());
    }

    public function testUnsupportedCountryExceptionGetValue(): void
    {
        $exception = new UnsupportedCountryException('ZZ');

        $this->assertSame('ZZ', $exception->getValue());
        $this->assertSame('error.unsupported_country', $exception->getMessage());
    }
}
