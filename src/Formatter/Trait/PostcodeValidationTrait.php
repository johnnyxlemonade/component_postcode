<?php declare(strict_types=1);

namespace Lemonade\Postcode\Formatter\Trait;

use Lemonade\Postcode\Exception\InvalidPostcodeException;

use function preg_match;

/**
 * PostcodeValidationTrait
 *
 * Shared validation helpers for country-specific postcode formatters.
 * Provides reusable assertions to reduce boilerplate and keep
 * validation logic consistent across formatters.
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @author      Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
trait PostcodeValidationTrait
{
    /**
     * Asserts that the given postcode matches a regular expression.
     *
     * @throws InvalidPostcodeException
     */
    protected function assertMatches(string $postcode, string $pattern): void
    {
        if (preg_match($pattern, $postcode) !== 1) {
            throw new InvalidPostcodeException($postcode);
        }
    }
}
