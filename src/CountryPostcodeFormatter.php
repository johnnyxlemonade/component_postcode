<?php declare(strict_types=1);

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