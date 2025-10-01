<?php declare(strict_types=1);

namespace Lemonade\Postcode\Exception;

use RuntimeException;
use Throwable;

/**
 * UnsupportedCountryException
 *
 * Thrown when a valid ISO 3166-1 alpha-2 country code is recognized
 * but no formatter has been registered for the given country code.
 *
 * Carries the original country code value and the corresponding
 * {@see PostcodeErrorCode}.
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @author      Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
final class UnsupportedCountryException extends RuntimeException implements PostcodeException
{
    public function __construct(
        private readonly string $country,
        PostcodeErrorCode $code = PostcodeErrorCode::UnsupportedCountry,
        ?Throwable $previous = null
    ) {
        parent::__construct($code->messageKey(), $code->value, $previous);
    }

    public function getValue(): string
    {
        return $this->country;
    }
}
