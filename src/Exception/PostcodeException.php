<?php declare(strict_types=1);

namespace Lemonade\Postcode\Exception;

interface PostcodeException
{
    public function getValue(): string;
}
