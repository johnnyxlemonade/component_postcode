<?php declare(strict_types=1);

namespace Lemonade\Postcode\Tests;

use Lemonade\Postcode\Exception\PostcodeErrorCode;
use PHPUnit\Framework\TestCase;

final class PostcodeErrorCodeTest extends TestCase
{
    public function testMessageKeysForAllCases(): void
    {
        $expected = [
            'UnknownCountry'     => 'error.unknown_country',
            'InvalidFormat'      => 'error.invalid_postcode',
            'UnsupportedValue'   => 'error.unsupported_value',
            'UnsupportedCountry' => 'error.unsupported_country',
        ];

        foreach (PostcodeErrorCode::cases() as $case) {
            $this->assertSame(
                $expected[$case->name],
                $case->messageKey(),
                "Failed asserting messageKey for {$case->name}"
            );
        }
    }
}
