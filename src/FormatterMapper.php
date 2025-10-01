<?php declare(strict_types=1);

namespace Lemonade\Postcode;

use Lemonade\Postcode\Formatter\{
    AD_Formatter,
    AL_Formatter,
    AT_Formatter,
    BA_Formatter,
    BE_Formatter,
    BG_Formatter,
    BY_Formatter,
    CH_Formatter,
    CY_Formatter,
    CZ_Formatter,
    DE_Formatter,
    DK_Formatter,
    EE_Formatter,
    ES_Formatter,
    FI_Formatter,
    FR_Formatter,
    GB_Formatter,
    GR_Formatter,
    HR_Formatter,
    HU_Formatter,
    IE_Formatter,
    IS_Formatter,
    IT_Formatter,
    LI_Formatter,
    LT_Formatter,
    LU_Formatter,
    LV_Formatter,
    MC_Formatter,
    MD_Formatter,
    ME_Formatter,
    MK_Formatter,
    MT_Formatter,
    NL_Formatter,
    NO_Formatter,
    PL_Formatter,
    PT_Formatter,
    RO_Formatter,
    RS_Formatter,
    RU_Formatter,
    SE_Formatter,
    SI_Formatter,
    SK_Formatter,
    SM_Formatter,
    UA_Formatter,
    VA_Formatter
};

/**
 * FormatterMapper
 *
 * Provides the default mapping of ISO 3166-1 alpha-2 country codes
 * to their corresponding {@see CountryPostcodeFormatter} implementations.
 *
 * This class acts as a convenience factory for building a
 * {@see FormatterRegistry} with all built-in formatters.
 *
 * Can be extended or replaced by user code if custom or third-party
 * formatters need to be registered.
 *
 * @package     Lemonade Framework
 * @link        https://lemonadeframework.cz/
 * @author      Honza Mudrak <honzamudrak@gmail.com>
 * @license     MIT
 * @since       1.0.0
 */
final class FormatterMapper
{
    /**
     * @return array<string, CountryPostcodeFormatter>
     */
    public static function all(): array
    {
        return [
            'AD' => new AD_Formatter(),
            'AL' => new AL_Formatter(),
            'AT' => new AT_Formatter(),
            'BA' => new BA_Formatter(),
            'BE' => new BE_Formatter(),
            'BG' => new BG_Formatter(),
            'BY' => new BY_Formatter(),
            'CH' => new CH_Formatter(),
            'CY' => new CY_Formatter(),
            'CZ' => new CZ_Formatter(),
            'DE' => new DE_Formatter(),
            'DK' => new DK_Formatter(),
            'EE' => new EE_Formatter(),
            'ES' => new ES_Formatter(),
            'FI' => new FI_Formatter(),
            'FR' => new FR_Formatter(),
            'GB' => new GB_Formatter(),
            'GR' => new GR_Formatter(),
            'HR' => new HR_Formatter(),
            'HU' => new HU_Formatter(),
            'IE' => new IE_Formatter(),
            'IS' => new IS_Formatter(),
            'IT' => new IT_Formatter(),
            'LI' => new LI_Formatter(),
            'LT' => new LT_Formatter(),
            'LU' => new LU_Formatter(),
            'LV' => new LV_Formatter(),
            'MC' => new MC_Formatter(),
            'MD' => new MD_Formatter(),
            'ME' => new ME_Formatter(),
            'MK' => new MK_Formatter(),
            'MT' => new MT_Formatter(),
            'NL' => new NL_Formatter(),
            'NO' => new NO_Formatter(),
            'PL' => new PL_Formatter(),
            'PT' => new PT_Formatter(),
            'RO' => new RO_Formatter(),
            'RS' => new RS_Formatter(),
            'RU' => new RU_Formatter(),
            'SE' => new SE_Formatter(),
            'SI' => new SI_Formatter(),
            'SK' => new SK_Formatter(),
            'SM' => new SM_Formatter(),
            'UA' => new UA_Formatter(),
            'VA' => new VA_Formatter(),
        ];
    }
}
