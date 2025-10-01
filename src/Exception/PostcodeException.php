<?php declare(strict_types=1);

namespace Lemonade\Postcode\Exception;

/**
 * PostcodeException
 *
 * Marker interface for all exceptions thrown by the Lemonade Postcode component.
 * Ensures a common contract for retrieving the original invalid value
 * that triggered the exception (country code or postcode).
 *
 * Implemented by {@see InvalidPostcodeException} and {@see UnknownCountryException}.
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @autor       Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
interface PostcodeException
{
    /**
     * Returns the original value that caused the exception.
     *
     * @return string
     */
    public function getValue(): string;
}
