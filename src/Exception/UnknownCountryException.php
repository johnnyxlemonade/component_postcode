<?php declare(strict_types=1);

namespace Lemonade\Postcode\Exception;

use RuntimeException;
use Throwable;

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
