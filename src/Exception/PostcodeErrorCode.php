<?php declare(strict_types=1);

namespace Lemonade\Postcode\Exception;

/**
 * PostcodeErrorCode
 *
 * Enumeration of error codes used by the Lemonade Postcode component.
 * Provides stable integer values as well as translation keys
 * for localizable error messages.
 *
 * Used in conjunction with {@see InvalidPostcodeException}
 * and {@see UnknownCountryException}.
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @author      Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
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
