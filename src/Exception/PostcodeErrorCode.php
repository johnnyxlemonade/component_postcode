<?php declare(strict_types=1);

namespace Lemonade\Postcode\Exception;

enum PostcodeErrorCode: int
{
    case UnknownCountry   = 1001;
    case InvalidFormat    = 1002;
    case UnsupportedValue = 1003;

    /**
     * Translation key for this error
     */
    public function messageKey(): string
    {
        return match ($this) {
            self::UnknownCountry   => 'error.unknown_country',
            self::InvalidFormat    => 'error.invalid_postcode',
            self::UnsupportedValue => 'error.unsupported_value',
        };
    }
}
