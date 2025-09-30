<?php declare(strict_types=1);

/**
 * Class CountryPostcodeFormatter
 *
 * Lemonade\Postcode
 * @author Honza Mudrak <honzamudrak@gmail.com>
 */
namespace Lemonade\Postcode;

/**
 * Validace a formatovani PSC
 */
interface CountryPostcodeFormatter
{
    /**
     * Overuje a formatuje zadane postovni smerovaci cislo.
     * Postovni smerovaci cislo musi byt neprazdny retezec velkych alfanumerickych znaku bez oddelovac
     * @param string $postcode
     * @return string|null
     */
    public function format(string $postcode): ?string;
}