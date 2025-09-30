<?php declare(strict_types=1);

namespace Lemonade\Postcode;

use Lemonade\Postcode\Exception\InvalidPostcodeException;

/**
 * Formatter a validátor PSČ pro konkrétní stát.
 *
 * @api
 */
interface CountryPostcodeFormatter
{
    /**
     * Ověří a naformátuje zadané PSČ.
     * Vstup je vždy alfanumerický uppercase bez oddělovačů.
     *
     * @throws InvalidPostcodeException Pokud PSČ není validní.
     */
    public function format(string $postcode): string;
}
