<?php declare(strict_types=1);

namespace Lemonade\Postcode\Exception;

use RuntimeException;
use Throwable;

/**
 * InvalidPostcodeException
 *
 * Thrown when a given postcode does not match the expected format
 * or contains unsupported values for a specific country.
 *
 * Carries the original invalid postcode value and the corresponding
 * {@see PostcodeErrorCode}.
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @author      Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
final class InvalidPostcodeException extends RuntimeException implements PostcodeException
{
    public function __construct(
        private readonly string $postcode,
        PostcodeErrorCode $code = PostcodeErrorCode::InvalidFormat,
        ?Throwable $previous = null
    ) {
        parent::__construct($code->messageKey(), $code->value, $previous);
    }

    public function getValue(): string
    {
        return $this->postcode;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }
}
