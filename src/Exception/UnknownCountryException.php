<?php declare(strict_types=1);

namespace Lemonade\Postcode\Exception;

use RuntimeException;
use Throwable;

/**
 * UnknownCountryException
 *
 * Thrown when attempting to format a postcode for an unsupported
 * or unrecognized ISO 3166-1 alpha-2 country code.
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
final class UnknownCountryException extends RuntimeException implements PostcodeException
{
    public function __construct(
        private readonly string $country,
        PostcodeErrorCode $code = PostcodeErrorCode::UnknownCountry,
        ?Throwable $previous = null
    ) {
        parent::__construct($code->messageKey(), $code->value, $previous);
    }

    public function getValue(): string
    {
        return $this->country;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}
