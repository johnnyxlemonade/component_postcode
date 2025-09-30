<?php declare(strict_types=1);

namespace Lemonade\Postcode\Exception;

use RuntimeException;
use Throwable;

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
